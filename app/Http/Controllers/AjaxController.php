<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\DataSekolahAsal;
use App\TahunAjaran;

class AjaxController extends Controller
{
    public function ajaxDataSekolahAsal(Request $req){
    	// dd(DataSekolahAsal::all()->toJson());
    	// $data = [];

     //    if($req->has('q')){
     //        $search = $req->q;
     //        $data = DB::table("data_sekolah_asals")
     //        		->select("id_sekolah_asal","nama_sekolah")
     //        		->where('nama_sekolah','LIKE',"%" . $search . "%")
     //        		->get();
     //    }

     //    return response()->json($data);

    	$autocomplete = DB::table('data_sekolah_asals')
                        ->where('nama_sekolah','LIKE', '%' .  $req->nama_sekolah . '%')
                        ->take(10)
                        ->get();

        return $autocomplete;
    }

    public function ajaxTahunAjaran(Request $req){
        $data = DB::table('tahun_ajarans')
                        ->join('jadwal_pendaftarans','jadwal_pendaftarans.id_th_ajaran','tahun_ajarans.id_th_ajaran')
                        ->where('tahun_ajarans.id_th_ajaran',$req->id_th_ajaran)
                        ->select('jadwal_pendaftarans.id_jadwal','jadwal_pendaftarans.nama_jadwal')
                        ->get();
        $return $data;
    }
}
