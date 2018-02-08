<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\TesSeleksi;
use App\DetailTesSeleksi;
use App\Pertanyaan;
use App\Jawaban;
use App\Jadwal;
use App\TahunAjaran;
use App\Step;
use App\CalonSiswa;
use App\DaftarUlang;

use Auth;
use Carbon\Carbon;
use DB;

class TesSeleksiAkademikController extends Controller
{
    

	private $user;
    private $calonsiswa;
	private $carbon;
	private $randoms;
	// private $no_pendf;
	private $id_pertanyaans;
	private $countdown;
    // private $waktu_selesai;

    private $tesseleksi;
    private $no_tes_seleksi;
    private $no_pendf;
    private $tgl_tes_akad;
    private $waktu_mulai;
    private $waktu_selesai;
    private $jumlah_benar;
    private $jumlah_salah;
    private $nilai_tes_seleksi;
    private $status_tes_seleksi;
    private $status_kelulusan;

	public function __construct(){
		$this->middleware(function ($request, $next) {
	        $this->user = Auth::user();
            $this->no_pendf = $this->user->calonsiswa->no_pendf;
	        return $next($request);
	    });

        $this->carbon = Carbon::now();
	}

    public function setTesSeleksi(){
        $this->tesseleksi = TesSeleksi::where('no_pendf',$this->no_pendf)->first();
        if (is_null($this->tesseleksi)) {
            $this->tesseleksi = new TesSeleksi();
            $this->tesseleksi->no_tes_seleksi = 'TS' . date('y-') . sprintf('%05d', TesSeleksi::all()->count() + 1);
            $this->tesseleksi->no_pendf = $this->no_pendf;
            $this->tesseleksi->save();
        }

        $this->tgl_tes_akad = $this->tesseleksi->tgl_tes_akad;
        $this->waktu_mulai = $this->tesseleksi->waktu_mulai;
        $this->waktu_selesai = $this->tesseleksi->waktu_selesai;
        $this->jumlah_benar = $this->tesseleksi->jumlah_benar;
        $this->jumlah_salah = $this->tesseleksi->jumlah_salah;
        $this->nilai_tes_seleksi = $this->tesseleksi->nilai_tes_seleksi;
        $this->status_tes_seleksi = $this->tesseleksi->status_tes_seleksi;
        $this->status_kelulusan = $this->tesseleksi->status_kelulusan;
    }

	public function dateFormat($date){
        return Carbon::createFromFormat('d-m-Y', $date)->toDateString();
    }

    public function index(){
        if (is_null($this->user->calonsiswa->tesseleksi)) {
            $tesseleksi = new TesSeleksi();
            $tesseleksi->no_tes_seleksi = 'TS' . date('y-') . sprintf('%05d', TesSeleksi::all()->count() + 1);
            $tesseleksi->no_pendf = $this->no_pendf;
            $tesseleksi->save();
        }

        $step = Step::where('no_pendf', $this->user->calonsiswa->no_pendf)->first();

        if ($step->step_2 == 'active' || $step->step_3 == 'active') {
            $message_pembayaran = 'Silahkan melakukan Pembayaran kemudian Konfirmasi Pembayaran agar dapat mengikuti Tes Seleksi Akademik';
        }

        if ($this->timeCheck() && ($step->step_4 == 'active' || $step->step_5 == 'active' || $step->step_6 == 'active')) {
            if ($this->user->calonsiswa->tesseleksi->status_tes_seleksi == 'belum dimulai') {
                $message = 'Mulai Tes';
                $route = 'indexQuizTesSeleksiAkademikSiswa';
            } elseif ($this->user->calonsiswa->tesseleksi->status_tes_seleksi == 'sedang berjalan') {
                $message = 'Lanjutkan Tes';
                $route = 'indexQuizTesSeleksiAkademikSiswa';
            } elseif ($this->user->calonsiswa->tesseleksi->status_tes_seleksi == 'selesai') {
                $step = Step::where('no_pendf', $this->user->calonsiswa->no_pendf)->first();
                $step->step_4 = 'complete';
                $step->step_5 = 'active';
                $step->save();
                
                $message = 'Lihat Hasil Tes';
                $route = 'hasilTesSeleksiAkademikSiswa';
            } elseif ($this->user->calonsiswa->tesseleksi->status_tes_seleksi == 'sudah lewat') {
                $step = Step::where('no_pendf', $this->user->calonsiswa->no_pendf)->first();
                $step->step_4 = 'complete';
                $step->step_5 = 'active';
                $step->save();
                
                $message = 'Lihat Hasil Tes';
                $route = 'hasilTesSeleksiAkademikSiswa';
            }
        }

        $jadwal_tes = $this->user->calonsiswa->jadwal;
        return view('pages.siswa.tesseleksi.index2', compact('jadwal_tes','message','route','message_pembayaran','message_pembayarans'));    
    }

    public function quiz() {
        if ($this->user->calonsiswa->tesseleksi->status_tes_seleksi == 'selesai' || $this->user->calonsiswa->tesseleksi->status_tes_seleksi == 'sudah lewat') {
            return redirect(route('indexTesSeleksiAkademikSiswa'));
        } else {
            if ($this->timeCheck()) {
                if (is_null($this->user->calonsiswa->tesseleksi->waktu_mulai)) {
                    $this->startQuiz();
                } 

                $no_pertanyaan = DB::table('tes_seleksis')
                                        ->join('detail_tes_seleksis','detail_tes_seleksis.no_tes_seleksi','tes_seleksis.no_tes_seleksi')
                                        ->where('tes_seleksis.no_pendf',$this->user->calonsiswa->no_pendf)
                                        ->get()->count();
                $total_pertanyaan = Pertanyaan::all()->count();

                if ($no_pertanyaan < $total_pertanyaan) {
                    $no_pertanyaan = $no_pertanyaan + 1;
                    $quiz = Pertanyaan::find($no_pertanyaan);
                    $carbon = new Carbon($this->user->calonsiswa->tesseleksi->tgl_tes_akad . ' ' . $this->user->calonsiswa->tesseleksi->waktu_mulai);
                    $countdown = $carbon->addHour()->format('Y/m/d H:i:s');
                    return view('pages.siswa.tesseleksi.quiz', compact('quiz','no_pertanyaan','total_pertanyaan','countdown'));
                } else {
                    if (is_null($this->user->calonsiswa->tesseleksi->waktu_selesai)) {
                        $this->hitungTesSeleksi();
                        $this->user->calonsiswa->tesseleksi->waktu_selesai = $this->carbon->toTimeString();
                        $this->user->calonsiswa->tesseleksi->status_tes_seleksi = 'selesai';
                        $this->user->calonsiswa->tesseleksi->save();
                    }
                    $quiz_done = "Sudah Selesai";
                    return view('pages.siswa.tesseleksi.quiz', compact('quiz_done'));
                }
            } else {
                $quiz_timeout = "Maaf, Waktu Sudah Habis";
                return view('pages.siswa.tesseleksi.quiz',compact('quiz_timeout'));
            }
        }
        
    }

    public function startQuiz() {
        $this->user->calonsiswa->tesseleksi->waktu_mulai = $this->carbon->toTimeString();
        $this->user->calonsiswa->tesseleksi->tgl_tes_akad = $this->carbon->toDateString();
        $this->user->calonsiswa->tesseleksi->save();
    }

    public function timeCheck(){
        $tes_terbuka = DB::table('jadwal_pendaftarans')
                    ->join('tahun_ajarans','tahun_ajarans.id_th_ajaran','jadwal_pendaftarans.id_th_ajaran')
                    ->whereDate('tgl_mulai_tes','<=',$this->carbon->toDateString())
                    ->whereDate('tgl_akhir_tes','>=',$this->carbon->toDateString())
                    ->first();
        if (is_null($tes_terbuka)) {
            return false;
        } else {
            return true;
        }
    }

    public function postQuiz(Request $req){
    	$detail_tes = new DetailTesSeleksi();
		$detail_tes->no_tes_seleksi = $this->user->calonsiswa->tesseleksi->no_tes_seleksi;
		$detail_tes->id_pertanyaan = $req->id_pertanyaan;
		$detail_tes->id_pilihan_jawaban = $req->pilihan_jawaban;
		$detail_tes->save();

        $status_jawaban = $detail_tes->pilihanJawaban->status_jawaban;
        // Hitung Tes
        if ($status_jawaban == 'salah') {
            $tesseleksi = $this->user->calonsiswa->tesseleksi;
            $tesseleksi->jumlah_salah = ++$tesseleksi->jumlah_salah;
            $tesseleksi->save();
        } elseif ($status_jawaban == 'benar') {
            $tesseleksi = $this->user->calonsiswa->tesseleksi;
            $tesseleksi->jumlah_benar = ++$tesseleksi->jumlah_benar;
            $tesseleksi->save();
        }
    	return redirect(route('indexQuizTesSeleksiAkademikSiswa'));
    }

    public function hitungTesSeleksi(){
        $jawaban_benar = DB::table('tes_seleksis')
                    ->where('tes_seleksis.no_tes_seleksi', $this->user->calonsiswa->tesseleksi->no_tes_seleksi)
                    ->join('detail_tes_seleksis','detail_tes_seleksis.no_tes_seleksi','tes_seleksis.no_tes_seleksi')
                    ->join('pilihan_jawabans','pilihan_jawabans.id_pilihan_jawaban','detail_tes_seleksis.id_pilihan_jawaban')
                    ->select('pilihan_jawabans.status_jawaban')
                    ->where('status_jawaban','benar')->get()->count();
        $jawaban_salah = DB::table('tes_seleksis')
                    ->where('tes_seleksis.no_tes_seleksi', $this->user->calonsiswa->tesseleksi->no_tes_seleksi)
                    ->join('detail_tes_seleksis','detail_tes_seleksis.no_tes_seleksi','tes_seleksis.no_tes_seleksi')
                    ->join('pilihan_jawabans','pilihan_jawabans.id_pilihan_jawaban','detail_tes_seleksis.id_pilihan_jawaban')
                    ->select('pilihan_jawabans.status_jawaban')
                    ->where('status_jawaban','salah')->get()->count();
        
        $this->user->calonsiswa->tesseleksi->jumlah_benar = $jawaban_benar;
        $this->user->calonsiswa->tesseleksi->jumlah_salah = $jawaban_salah;
        $this->user->calonsiswa->tesseleksi->save();

        $jumlah_soal = Pertanyaan::all()->count();
        $nilai_per_soal = 100 / $jumlah_soal;
            
        $this->user->calonsiswa->tesseleksi->nilai_tes_seleksi = $this->user->calonsiswa->tesseleksi->jumlah_benar * $nilai_per_soal;
        $this->user->calonsiswa->tesseleksi->save();

        if ($this->user->calonsiswa->tesseleksi->nilai_tes_seleksi <= 70 ) {
            $this->user->calonsiswa->tesseleksi->status_kelulusan = 'tidak lulus';
        } else {
            $this->user->calonsiswa->tesseleksi->status_kelulusan = 'lulus';
        }
        $this->user->calonsiswa->tesseleksi->save();
    }

    public function hasil(){
        $step = Step::where('no_pendf', $this->user->calonsiswa->no_pendf)->first();
        $step->step_5 = 'complete';
        $step->step_6 = 'active';
        $step->save();

        if (is_null($this->user->calonsiswa->daftarulang)) {
            $count_du = CalonSiswa::count();
            $no_du = "DF" . date("y-") . (sprintf('%05d', $count_du + 1));
            $daftarulang = new DaftarUlang();
            $daftarulang->no_daftar_ulang = $no_du;
            $daftarulang->no_pendf = $this->user->calonsiswa->no_pendf;
            $daftarulang->save();
        }

        $tesseleksi = $this->user->calonsiswa->tesseleksi;
        return view('pages.siswa.tesseleksi.hasil', compact('tesseleksi'));
    }

    public function detail(){
        $detailtes = $this->user->calonsiswa->tesseleksi->detail->get();
        return view('pages.siswa.tesseleksi.detail', compact('detailtes'));
    }

    
    // Index Lama
    // public function index(){
    // 	$hasil_tes_seleksi = $this->user->calonSiswa->hasilTesSeleksi;
    // 	$jadwal_tes = DB::table('jadwal_pendaftarans')
    //                 ->whereDate('tgl_mulai_tes','<=',$this->carbon)
    //                 ->whereDate('tgl_akhir_tes','>=',$this->carbon)
    //                 ->first();
    // 	return view('pages.siswa.tesseleksi.index', compact('jadwal_tes','hasil_tes_seleksi'));
    // }
}
