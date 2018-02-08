<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\JadwalPendaftaran;
use App\TahunAjaran;
use App\CalonSiswa;
use App\Jurusan;
use App\User;

use DB;

use Carbon\Carbon;

class PendaftaranController extends Controller
{
    public function dateFormat($date){
        return Carbon::createFromFormat('d-m-Y', $date)->toDateString();
    }
    
    public function index($id_jadwal = null){
        $tahunajarans = TahunAjaran::all();
        $jadwals = JadwalPendaftaran::all();
        if ($id_jadwal == null) {
            $jadwal = JadwalPendaftaran::orderBy('created_at','desc')->first();
            // $calonsiswas = CalonSiswa::where('id_jadwal',$jadwal->id_jadwal)->get();
        } else {
            $jadwal = JadwalPendaftaran::find($id_jadwal);
            // $calonsiswas = CalonSiswa::where('id_jadwal',$jadwal->id_jadwal)->get();
        }

        $calonsiswas = CalonSiswa::where('id_jadwal',$jadwal->id_jadwal)->paginate(20);
        return view('pages.admin.pendaftaran.index', compact('tahunajarans','jadwals','jadwal','calonsiswas','paginates'));
    }

    // public function postIndex(Request $req){
    //     $tahunajarans = TahunAjaran::all();
    //     $jadwals = JadwalPendaftaran::all();
    //     $jadwal = JadwalPendaftaran::find($req->id_jadwal);
    //     $calonsiswas = CalonSiswa::where('id_jadwal',$jadwal->id_jadwal)->get();
    //     $paginates = CalonSiswa::where('id_jadwal',$jadwal->id_jadwal)->paginate(20);
    //     return view('pages.admin.pendaftaran.index', compact('tahunajarans','jadwals','jadwal','calonsiswas','paginates'));
    // }

    public function add(){
    	return view('pages.admin.pendaftaran.index');	
    }

    public function edit($id){
        $jurusans = Jurusan::all();
        $calonsiswa = CalonSiswa::find($id);
        return view('pages.admin.pendaftaran.edit', compact('jurusans','calonsiswa'));
    }

    public function update(Request $req, $no_pendf){
        $user = User::find($req->id_user);
        $user->email = $req->email;
        $user->save();

        $calonsiswa = CalonSiswa::find($no_pendf);
        $calonsiswa->id_user = $req->id_user;
        $calonsiswa->id_jadwal = $req->id_jadwal;
        $calonsiswa->kd_jurusan = $req->kd_jurusan;
        $calonsiswa->id_jadwal = $req->id_jadwal;
        $calonsiswa->nm_cln_siswa = $req->nm_cln_siswa;
        $calonsiswa->nisn = $req->nisn;
        $calonsiswa->jns_kelamin = $req->jns_kelamin;
        $calonsiswa->tmp_lahir = $req->tmp_lahir;
        $calonsiswa->tgl_lahir = $this->dateFormat($req->tgl_lahir);
        $calonsiswa->agama = $req->agama;
        $calonsiswa->alamat = $req->alamat;
        $calonsiswa->nm_ortu = $req->nm_ortu;
        $calonsiswa->pkrj_ortu = $req->pkrj_ortu;
        $calonsiswa->gaji_ortu = $req->gaji_ortu;
        $calonsiswa->sklh_asal = $req->sklh_asal;
        $calonsiswa->save();
        
        return redirect(route('indexPendaftaranAdmin'));
    }

    public function delete($id){
        $pendaftaran = CalonSiswa::find($id)->delete();
        if ($pendaftaran) {
            flash('Data Pendaftaran dengan No. Pendaftaran ' . $id . ' Berhasil Dihapus')->success();
        } else {
            flash('Data Pendaftaran dengan No. Pendaftaran ' . $id . ' Tidak Berhasil Dihapus')->error();
        }
        return redirect(route('indexPendaftaranAdmin'));
    }

    public function detail($id){
        $jurusans = Jurusan::all();
        $calonsiswa = CalonSiswa::find($id);
        return view('pages.admin.pendaftaran.detail', compact('jurusans','calonsiswa'));
    }

    public function ajaxSearch(Request $req){
    	$pendaftarans = DB::table('pendaftarans')
                            ->where('no_pendaftaran','LIKE','%' . $req->search . '%')
                            ->orWhere('nama_pendaftar','LIKE','%' . $req->search . '%')
                            ->orWhere('pil_jurusan_1','LIKE','%' . $req->search . '%')
                            ->orWhere('pil_jurusan_2','LIKE','%' . $req->search . '%')
                            ->get()->take(20);
        return $pendaftarans;
    }

    public function ajaxShow(Request $req){
        $pendaftarans = DB::table('tahun_ajarans')
                            ->join('jadwal_pendaftarans','jadwal_pendaftarans.id_th_ajaran','tahun_ajarans.id_th_ajaran')
                            ->where('tahun_ajarans.id_th_ajaran',$req->id_th_ajaran)
                            ->select('jadwal_pendaftarans.id_jadwal','jadwal_pendaftarans.nm_jadwal')
                            ->get();
        return $pendaftarans;
    }

    public function postSearch(Request $req, $id_jadwal = null){
        $tahunajarans = TahunAjaran::all();
        $jadwals = JadwalPendaftaran::all();
        if ($id_jadwal == null) {
            $jadwal = JadwalPendaftaran::orderBy('created_at','desc')->first();
            // $calonsiswas = CalonSiswa::where('id_jadwal',$jadwal->id_jadwal)->get();
        } else {
            $jadwal = JadwalPendaftaran::find($id_jadwal);
            // $calonsiswas = CalonSiswa::where('id_jadwal',$jadwal->id_jadwal)->get();
        }

        // $calonsiswas = DB::table('jadwal_pendaftarans')
        //                 ->join('calon_siswas','calon_siswas.id_jadwal','jadwal_pendaftarans.id_jadwal')
        //                 ->join('jurusans','jurusans.kd_jurusan','calon_siswas.kd_jurusan')
        //                 ->where('jadwal_pendaftarans.id_jadwal',$jadwal->id_jadwal)
        //                 ->orWhere(function ($query) use ($req) {
        //                     $query->where('calon_siswas.no_pendf', 'LIKE', '$' . $req->q . '%')
        //                           ->orWhere('calon_siswas.nm_cln_siswa', 'LIKE', '$' . $req->q . '%')
        //                           ->orWhere('calon_siswas.alamat', 'LIKE', '$' . $req->q . '%')
        //                           ->orWhere('jurusans.nm_jurusan', 'LIKE', '$' . $req->q . '%');
        //                 })
        //                 ->paginate(20);
        $calonsiswas = CalonSiswa::where(function ($query) use ($req) {
                                $query->orWhere('no_pendf', 'LIKE', '%' . $req->q . '%')
                                      ->orWhere('nm_cln_siswa', 'LIKE', '%' . $req->q . '%')
                                      ->orWhere('alamat', 'LIKE', '%' . $req->q . '%');
                                    })
                                ->where('id_jadwal',$jadwal->id_jadwal)
                                ->paginate(1000);
        // $calonsiswas = CalonSiswa::where('id_jadwal',$jadwal->id_jadwal)->paginate(20);
        $search_result = $req->q;
        return view('pages.admin.pendaftaran.index', compact('tahunajarans','jadwals','jadwal','calonsiswas','paginates','search_result'));
    }
}
