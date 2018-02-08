<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use Carbon\Carbon;
use Image;

use App\CalonSiswa;
use App\Jurusan;
use App\User;

class PendaftaranController extends Controller
{
	private $user;

	public function __construct(){
		$this->middleware(function ($request, $next) {
	        $this->user= Auth::user();

	        return $next($request);
	    });
	}

	public function dateFormat($date){
        return Carbon::createFromFormat('d-m-Y', $date)->toDateString();
    }

    public function index(){
    	$jurusans = Jurusan::all();
    	$calonsiswa = $this->user->calonsiswa;
    	return view('pages.siswa.pendaftaran.index', compact('calonsiswa','jurusans'));
    }

    public function edit(){
        $jurusans = Jurusan::all();
        $calonsiswa = $this->user->calonsiswa;
        return view('pages.siswa.pendaftaran.edit', compact('jurusans','calonsiswa'));
    }

    public function update(Request $req){
        $user = User::find($this->user->id_user);
        $user->email = $req->email;
        if (!empty($req->password)) {
            $user->password = bcrypt($req->password);
        }
        $user->save();

        $calonsiswa = CalonSiswa::find($this->user->calonsiswa->no_pendf);
        $calonsiswa->id_user = $this->user->id_user;
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
        
        flash('Data Berhasil Diubah')->success();
        return redirect(route('indexPendaftaranSiswa'));
    }
}
