<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\TahunAjaran;
use App\JadwalPendaftaran;
use App\CalonSiswa;
use App\TesSeleksi;

use DB;
use Carbon\Carbon;

class TesSeleksiAkademikController extends Controller
{
    private $carbon;

    public function __construct(){
        $this->carbon = Carbon::now();
    }

    public function dateFormat($date){
        return Carbon::createFromFormat('d-m-Y', $date)->toDateString();
    }

    public function index(){
        $tahunajarans = TahunAjaran::all();

        $jadwal_terbuka = DB::table('jadwal_pendaftarans')
                    ->whereDate('tgl_mulai_pendf','<=',$this->carbon)
                    ->whereDate('tgl_hasil_seleksi','>=',$this->carbon)
                    ->first();
        // $id_jadwal_terbuka = $jadwal_terbuka->id_jadwal;
        if (is_null($jadwal_terbuka)) {
            $id_jadwal_terbuka = JadwalPendaftaran::orderBy('created_at','desc')->first()->id_jadwal;
        } else {
            $id_jadwal_terbuka = $jadwal_terbuka->id_jadwal;
        }

        $jadwal = JadwalPendaftaran::find($id_jadwal_terbuka);
        // $id_jadwal = $jadwal->id_jadwal;

        $tesseleksis = DB::table('jadwal_pendaftarans')
                            ->join('calon_siswas','calon_siswas.id_jadwal','jadwal_pendaftarans.id_jadwal')
                            ->join('jurusans','jurusans.kd_jurusan','calon_siswas.kd_jurusan')
                            ->join('tes_seleksis','tes_seleksis.no_pendf','calon_siswas.no_pendf')
                            ->where('jadwal_pendaftarans.id_jadwal', $id_jadwal_terbuka)
                            ->select('calon_siswas.no_pendf','nm_cln_siswa','nm_jurusan','tgl_tes_akad','nilai_tes_seleksi','status_kelulusan')
                            ->get();

        return view('pages.admin.tesseleksi.index', compact('jadwal','tahunajarans','tesseleksis'));
    }

    public function postIndex(Request $req){
    	$tahunajarans = TahunAjaran::all();
    	$jadwal = JadwalPendaftaran::orderBy('created_at','dest')->first();
        $id_jadwal = $jadwal->id_jadwal;
    	$belum_input_nilais = Pendaftaran::where('id_jadwal',$req->id_jadwal)->where('status_pemb_reg','sudah')->where('status_tes_akademik','belum')->paginate(20);
    	$sudah_input_nilais = Pendaftaran::where('id_jadwal',$req->id_jadwal)->where('status_pemb_reg','sudah')->where('status_tes_akademik','sudah')->paginate(20);
    	// $belum_input_nilais->withPath('paginate/index');
    	// $sudah_input_nilais->withPath('paginate/index');
    	return view('pages.admin.tesseleksi.index', compact('jadwal','tahunajarans','belum_input_nilais','sudah_input_nilais'));
    }

    public function postNilai(Request $req){
        foreach ($req->data as $data) {
            $tesseleksi = new TesSeleksi();
            $tesseleksi->no_pendf = $data['no_pendf'];
            $tesseleksi->tgl_tes_akad = $this->dateFormat($data['tgl_tes_akad']);
            $tesseleksi->nilai_tes_akad = $data['nilai_tes_akad'];
            $tesseleksi->sts_tes_akad = $data['sts_tes_akad'];
            $tesseleksi->save();

            $calonsiswa = CalonSiswa::find($data['no_pendf']);
            $calonsiswa->status_tes = "sudah";
            $calonsiswa->save();
        }
        return redirect(route('indexTesSeleksiAkademikAdmin'));
    }

    public function updateNilai(Request $req){

        foreach ($req->data as $data) {
            $tesseleksi = TesSeleksi::where('no_pendf',$data['no_pendf'])->first();
            $tesseleksi->tgl_tes_akad = $this->dateFormat($data['tgl_tes_akad']);
            $tesseleksi->nilai_tes_seleksi = $data['nilai_tes_akad'];
            $tesseleksi->status_kelulusan = $data['sts_tes_akad'];
            $tesseleksi->save();
        }
        return redirect(route('indexTesSeleksiAkademikAdmin'));
    }

    public function ajaxSearch(Request $req){
    	$pendaftarans = DB::table('pendaftarans')
                            ->where('no_pendf','LIKE','%' . $req->search . '%')
                            ->orWhere('nama_pendaftar','LIKE','%' . $req->search . '%')
                            ->get()->take(20);
        return $pendaftarans;
    }

    public function paginatePostIndex(){
    	$tahunajarans = TahunAjaran::all();
    	$id_jadwal = JadwalPendaftaran::orderBy('created_at','dest')->first()->id_jadwal;
    	$belum_input_nilais = Pendaftaran::where('id_jadwal',$req->id_jadwal)->where('status_tes_akademik','belum')->paginate(20);
    	$sudah_input_nilais = Pendaftaran::where('id_jadwal',$req->id_jadwal)->where('status_tes_akademik','sudah')->paginate(20);
    	$belum_input_nilais->withPath('paginate/index');
    	$sudah_input_nilais->withPath('paginate/index');
    	return view('pages.admin.tesseleksi.index', compact('tahunajarans','belum_input_nilais','sudah_input_nilais'));
    }
}
