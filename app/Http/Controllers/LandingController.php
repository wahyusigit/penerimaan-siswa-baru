<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\JadwalPendaftaran;
use App\Jurusan;
use App\CalonSiswa;
use App\User;
use App\Role;
use App\Step;

use DB;
use Image;
use Carbon\Carbon;

class LandingController extends Controller
{
    private $carbon;

    public function __construct(){
        $this->carbon = Carbon::now();
    }

    public function dateFormat($date){
        return Carbon::createFromFormat('d/m/Y', $date)->toDateString();
    }
    
    public function index(){
    	return view('pages.landing.index');
    }

    public function jadwal(){
        // $jadwals = JadwalPendaftaran::all();
        $jadwal_terbuka = DB::table('jadwal_pendaftarans')
                    ->join('tahun_ajarans','tahun_ajarans.id_th_ajaran','jadwal_pendaftarans.id_th_ajaran')
                    // ->where('tahun_ajarans.th_ajaran','LIKE','%' . '2018/' . '%')
                    // ->select('jadwal_pendaftarans.*','tahun_ajarans.*')
                    ->whereDate('tgl_mulai_pendf','<=',$this->carbon->toDateString())
                    ->whereDate('tgl_akhir_pendf','>=',$this->carbon->toDateString())
                    ->first();

        $jadwal_terbukas = DB::table('jadwal_pendaftarans')
                    ->join('tahun_ajarans','tahun_ajarans.id_th_ajaran','jadwal_pendaftarans.id_th_ajaran')
                    ->where('tahun_ajarans.th_ajaran','LIKE','%' . '2018/' . '%')
                    // ->whereDate('tgl_mulai_pendf','<=',$this->carbon)
                    // ->whereDate('tgl_akhir_pendf','>=',$this->carbon)
                    ->get();
        return view('pages.landing.jadwal',compact('jadwals','jadwal_terbuka','jadwal_terbukas'));
    }

    public function panduanPendaftaran(){
        return view('pages.landing.panduan_pendaftaran');
    }

    public function pendaftaran(){
        $carbon = Carbon::now()->toDateString();

        $jadwal = DB::table('jadwal_pendaftarans')
                    // ->whereRaw('"' . $carbon . '" between "tanggal_mulai_pendf" and "tanggal_selesai_pendf"')
                    ->whereDate('tgl_mulai_pendf','<=',$carbon)
                    ->whereDate('tgl_akhir_pendf','>=',$carbon)
                    ->first();
        $jurusans = Jurusan::All();
    	return view('pages.landing.pendaftaran2', compact('jurusans','jadwal'));
    }

    public function postPendaftaran(Request $req){
        $id_role = Role::where('name','siswa')->first()->id_role;

        $user = new User();
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->id_role = $id_role;
        $user->save();

        $count_pendaftaran = CalonSiswa::count();
        $no_pendf = "DF" . date("y-") . (sprintf('%05d', $count_pendaftaran + 1));

        $calonsiswa = new CalonSiswa();
        $calonsiswa->no_pendf = $no_pendf;
        $calonsiswa->id_user = $user->id_user;
        $calonsiswa->kd_jurusan = $req->kd_jurusan;
        $calonsiswa->id_jadwal = $req->id_jadwal;
        $calonsiswa->nm_cln_siswa = $req->nm_cln_siswa;
        $calonsiswa->nisn = $req->nisn;
        $calonsiswa->jns_kelamin = $req->jns_kelamin;
        $calonsiswa->tmp_lahir = $req->tmp_lahir;
        $calonsiswa->tgl_lahir = $req->tgl_lahir;
        $calonsiswa->agama = $req->agama;
        $calonsiswa->alamat = $req->alamat;
        $calonsiswa->nm_ortu = $req->nm_ortu;
        $calonsiswa->pkrj_ortu = $req->pkrj_ortu;
        $calonsiswa->gaji_ortu = $req->gaji_ortu;
        $calonsiswa->sklh_asal = $req->sklh_asal;
        $calonsiswa->save();

        $steps = new Step();
        $steps->no_pendf = $calonsiswa->no_pendf;
        $steps->step_1 = 'complete';
        $steps->step_2 = 'active';
        $steps->step_3 = 'disabled';
        $steps->step_4 = 'disabled';
        $steps->step_5 = 'disabled';
        $steps->step_6 = 'disabled';
        $steps->save();
        
        flash('Message')->success();
        return redirect(route('login'));
    }
}
