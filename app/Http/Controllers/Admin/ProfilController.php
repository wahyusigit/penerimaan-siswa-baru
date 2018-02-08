<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Panitia;
use Auth;

class ProfilController extends Controller
{
	private $user;

	public function __construct(){
		$this->middleware(function ($request, $next) {
	        $this->user= Auth::user();

	        return $next($request);
	    });
	}

    public function index(){
    	$panitia = $this->user->panitia;
    	return view('pages.admin.profile.index', compact('panitia'));
    }

    public function edit(){
    	$panitia = $this->user->panitia;
    	return view('pages.admin.profile.edit', compact('panitia'));
    }

    public function update(Request $req){
    	$panitia = Panitia::find($req->nip);
		$panitia->nm_panitia = $req->nm_panitia;
		$panitia->jns_kelamin = $req->jns_kelamin;
		$panitia->agama = $req->agama;
		$panitia->alamat = $req->alamat;
		$panitia->no_hp = $req->no_hp;
		$panitia->save();

    	return redirect(route('indexProfileAdmin'));
    }
}
