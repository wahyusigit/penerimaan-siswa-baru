<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Pembayaran;
use App\CalonSiswa;

use Carbon\Carbon;
use Auth;

class PembayaranController extends Controller
{

	public function dateFormat($date){
   	    return Carbon::createFromFormat('d-m-Y', $date)->toDateString();
   	}

    public function index(){
    	$pembayaran_blm_verifs = Pembayaran::where('sts_verif','belum')->paginate(10);
    	$pembayaran_sdh_verifs = Pembayaran::where('sts_verif','sudah')->paginate(10);
    	return view('pages.admin.pembayaran.index', compact('pembayaran_blm_verifs','pembayaran_sdh_verifs'));
    }

    public function add(){
    	
    }

    public function postAdd(Request $req){
    	
    }

    public function edit($id){
    	
    }
    
    public function update(Request $req){
    	
    }

    public function delete($id){
    	
    }

    public function detail($id){
    	
    }

    public function postVerifikasi(Request $req)
    {
    	$pembayaran = Pembayaran::find($req->no_pemb);
        $pembayaran->nip = Auth::user()->panitia->nip;
		$pembayaran->nm_pemilik_rek = $req->nama_pemilik;
		$pembayaran->no_rek = $req->no_rekening;
		$pembayaran->nm_bank = $req->nama_bank;
		$pembayaran->cbg_bank = $req->cabang_bank;
		$pembayaran->tgl_pembayaran = $req->tanggal_pemb;
		$pembayaran->sts_verif = "sudah";
        $pembayaran->tgl_verif = $this->dateFormat($req->tanggal_verif);

		if ($pembayaran->save()) {
            $user = CalonSiswa::find($pembayaran->no_pendf);
            $user->status_pembayaran = 'sudah';
            $user->save();
            $user->steps->update(['step_3'=>'complete','step_4'=>'active']);
            
            flash('Pembayaran Berhasil di Verifikasi')->success();
        } else {
            flash('Pembayaran Tidak Berhasil di Verifikasi')->error();
        }

		return redirect(route('indexPembayaranAdmin'));
    }
}
