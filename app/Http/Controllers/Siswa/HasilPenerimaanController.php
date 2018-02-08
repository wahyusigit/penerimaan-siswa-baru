<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\HasilPenerimaan;
use Auth;
use Carbon\Carbon;

class HasilPenerimaanController extends Controller
{
	private $user;
	private $carbon;

	public function __construct(){
		$this->middleware(function ($request, $next) {
	        $this->user= Auth::user();

	        return $next($request);
	    });

	    $this->carbon = Carbon::now();
	}

	public function dateFormat($date){
        return Carbon::createFromFormat('d-m-Y', $date)->toDateString();
    }

    public function index(){
    	$jadwal_terbuka = $this->user->calonsiswa->jadwal->tgl_hasil_seleksi;
    	if ($jadwal_terbuka == $this->carbon->toDateString()) {
    		$calonsiswa = $this->user->calonsiswa;

    		return view('pages.siswa.hasilpenerimaan.index',compact('calonsiswa'));
    	} else {
    		$message_header = "Maaf, Hasil Penerimaan Siswa belum dapat dilihat";
    		$message_content = "Silahkan lihat kembali pada tanggal " . $jadwal_terbuka;

    		return view('pages.siswa.hasilpenerimaan.index',compact('message_header','message_content'));
    	}
    }
}
