<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\TahunAjaran;
use App\CalonSiswa;
use App\Jurusan;
use App\Kelas;
use App\User;

use DB;
use Carbon\Carbon;

class JurusanKelasController extends Controller
{
    public function dateFormat($date){
        return Carbon::createFromFormat('d-m-Y', $date)->toDateString();
    }

    public function index(){
        $tahunajarans = TahunAjaran::all();
        $tahunajaran = TahunAjaran::orderBy('created_at','asc')->first();
    	$jurusans = Jurusan::all();
    	$kelas = $tahunajaran->kelas;
    	return view('pages.admin.jurusankelas.index', compact('tahunajarans','jurusans','kelas','tahunajaran'));
    }

    public function postIndex(Request $req){
        $tahunajarans = TahunAjaran::all();
        $tahunajaran = TahunAjaran::where('id_th_ajaran',$req->id_th_ajaran)->first();
        $jurusans = Jurusan::all();
        $kelas = $tahunajaran->kelas;
        return view('pages.admin.jurusankelas.index', compact('tahunajarans','jurusans','kelas','tahunajaran'));
    }

    public function indexKelas($kd_kelas){
        $tahunajarans = TahunAjaran::all();
        $kelas = Kelas::find($kd_kelas);
        return view('pages.admin.jurusankelas.index_kelas', compact('tahunajarans','kelas'));
    }

    public function postAddJurusan(Request $req){
    	$jurusan = new Jurusan();
        $jurusan->kd_jurusan = $req->kd_jurusan;
        $jurusan->nm_jurusan = $req->nm_jurusan;
        // $jurusan->daya_tampung = $req->daya_tampung;
        $jurusan->save();

        return redirect(route('indexJurusanKelasAdmin'));
    }

    public function postAddKelas(Request $req){
        $jurusan = new Kelas();
        $jurusan->kd_kelas = $req->kd_kelas;
        $jurusan->kd_jurusan = $req->kd_jurusan;
        $jurusan->nm_kelas = $req->nm_kelas;
        $jurusan->id_th_ajaran = $req->id_th_ajaran;
        $jurusan->save();

        return redirect(route('indexJurusanKelasAdmin'));
    }

    public function postUpdateJurusan(Request $req){
        $jurusan = Jurusan::find($req->kd_jurusan);
        $jurusan->nm_jurusan = $req->nm_jurusan;
        $jurusan->save();

        return redirect(route('indexJurusanKelasAdmin'));
    }

    public function postUpdateKelas(Request $req){
        $kelas = Kelas::find($req->kd_kelas);
        $kelas->kd_jurusan = $req->kd_jurusan;
        $kelas->nm_kelas = $req->nm_kelas;
        $kelas->save();

        return redirect(route('indexJurusanKelasAdmin'));
    }


    // Mau diubah ke method post - backup
    // public function deleteJurusan($id){
    //     $jurusan = Jurusan::find($id)->delete();
    //     return redirect(route('indexJurusanKelasAdmin'));
    // }
    
    // public function deleteKelas($id){
    //     $kelas = Kelas::find($id)->delete();
    //     return redirect(route('indexJurusanKelasAdmin'));   
    // }

    public function deleteJurusan(Request $req){
        $jurusan = Jurusan::find($req->kd_jurusan)->delete();
        if ($jurusan) {
            flash('Jurusan dengan kode ' . $req->kd_jurusan . ' berhasil dihapus...')->success();
        } else {
            flash('Jurusan dengan kode ' . $req->kd_jurusan . ' tidak berhasil dihapus...')->danger();
        }
        return redirect(route('indexJurusanKelasAdmin'));
    }
    
    public function deleteKelas(Request $req){
        $kelas = Kelas::find($req->kd_kelas)->delete();
        if ($kelas) {
            flash('Kelas dengan kode ' . $req->kd_kelas . ' berhasil dihapus...')->success();
        } else {
            flash('Kelas dengan kode ' . $req->kd_kelas . ' tidak berhasil dihapus...')->success();
        }
        return redirect(route('indexJurusanKelasAdmin'));   
    }

    public function detail($id){
    	
    }

    public function detailSiswa($no_pendf){
        $siswa = CalonSiswa::find($no_pendf);
        return view('pages.admin.jurusankelas.detail_siswa',compact('siswa'));
    }

    public function editSiswa($id){
        $jurusans = Jurusan::all();
        $siswa = CalonSiswa::find($id);
        return view('pages.admin.jurusankelas.edit_siswa', compact('jurusans','siswa'));
    }

    public function updateSiswa(Request $req, $no_pendf){
        $user = User::find($req->id_user);
        $user->email = $req->email;
        $user->save();

        $siswa = CalonSiswa::find($no_pendf);
        $siswa->id_user = $req->id_user;
        $siswa->id_jadwal = $req->id_jadwal;
        $siswa->kd_jurusan = $req->kd_jurusan;
        $siswa->id_jadwal = $req->id_jadwal;
        $siswa->nm_cln_siswa = $req->nm_cln_siswa;
        $siswa->nisn = $req->nisn;
        $siswa->jns_kelamin = $req->jns_kelamin;
        $siswa->tmp_lahir = $req->tmp_lahir;
        $siswa->tgl_lahir = $this->dateFormat($req->tgl_lahir);
        $siswa->agama = $req->agama;
        $siswa->alamat = $req->alamat;
        $siswa->nm_ortu = $req->nm_ortu;
        $siswa->pkrj_ortu = $req->pkrj_ortu;
        $siswa->gaji_ortu = $req->gaji_ortu;
        $siswa->sklh_asal = $req->sklh_asal;
        $siswa->save();
        
        return redirect(route('detailSiswaKelasAdmin', $siswa->no_pendf));
    }
}
