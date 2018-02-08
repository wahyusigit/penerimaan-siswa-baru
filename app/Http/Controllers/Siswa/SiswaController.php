<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

class SiswaController extends Controller
{
	private $user;

	public function __construct(){
		$this->middleware(function ($request, $next) {
	        $this->user= Auth::user();

	        return $next($request);
	    });
	}

    public function index(){
    	$timelines = ['registrasi' => 'bg-green'];

    	$check_konf_pemb = $this->user->pendaftaran->status_konf_pemb_reg;

    	if ($check_konf_pemb == 'sudah') {
    		$timelines['pembayaran_registrasi'] = 'bg-green';
    	} else {
    		$timelines['pembayaran_registrasi'] = 'bg-orange';
    	}
    	return view('pages.siswa.index', compact('timelines'));
    }

    public function postKonfirmasiPembayaranRegistrasi(){
    	$this->user->pendaftaran->update(['status_konf_pemb_reg'=>'sudah']);
    	return redirect(route('indexSiswa'));
    }
}
