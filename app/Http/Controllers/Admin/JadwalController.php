<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\JadwalPendaftaran;
use App\TahunAjaran;

use Carbon\Carbon;

class JadwalController extends Controller
{
	// private $carbon;

	// public function __construct(){
	// 	$this->setCarbon();
	// }

	// public function setCarbon(){
	// 	return $this->carbon = new Carbon();
	// }

	public function convertDate($date){
		return Carbon::createFromFormat("d-m-Y",$date)->toDateString();
	}

    public function index(){
    	$tahunajarans = TahunAjaran::all();
    	$jadwals = JadwalPendaftaran::paginate(10);
    	return view('pages.admin.jadwal.index', compact('tahunajarans','jadwals'));
    }

    public function add(){
    	$tahunajarans = TahunAjaran::all();
		return view('pages.admin.jadwal.add', compact('tahunajarans'));
    }

    public function postAdd(Request $req){
    	$jadwal = new JadwalPendaftaran();
		$jadwal->nm_jadwal = $req->nama_jadwal_pendf;
		$jadwal->tgl_mulai_pendf = $this->convertDate($req->tanggal_mulai_pendf);
		$jadwal->tgl_akhir_pendf = $this->convertDate($req->tanggal_selesai_pendf);
		$jadwal->tgl_mulai_tes = $this->convertDate($req->tanggal_mulai_tes);
		$jadwal->tgl_akhir_tes = $this->convertDate($req->tanggal_selesai_tes);
		$jadwal->tgl_hasil_seleksi = $this->convertDate($req->tanggal_pengumuman_penerimaan);
		$jadwal->id_th_ajaran = $req->id_th_ajaran;
		// $jadwal->th_ajaran = $req->th_ajaran;
		if ($jadwal->save()) {
			flash('Jadwal pendaftaran berhasil ditambahkan...')->success();
		} else {
			flash('Terjadi Kesalahan Sistem, Jadwal pendaftaran tidak dapat ditambahkan...')->danger();
		}

		return redirect(route('indexJadwalAdmin'));
    }

    public function edit($id){
    	$tahunajarans = TahunAjaran::all();
    	$jadwal = JadwalPendaftaran::find($id);
    	return view('pages.admin.jadwal.edit', compact('tahunajarans','jadwal'));
    }

    public function update(Request $req){
    	$jadwal = JadwalPendaftaran::find($req->id_jadwal);
		$jadwal->nm_jadwal = $req->nama_jadwal_pendf;
		$jadwal->tgl_mulai_pendf = $this->convertDate($req->tanggal_mulai_pendf);
		$jadwal->tgl_akhir_pendf = $this->convertDate($req->tanggal_selesai_pendf);
		$jadwal->tgl_mulai_tes = $this->convertDate($req->tanggal_mulai_tes);
		$jadwal->tgl_akhir_tes = $this->convertDate($req->tanggal_selesai_tes);
		$jadwal->tgl_hasil_seleksi = $this->convertDate($req->tanggal_pengumuman_penerimaan);
		$jadwal->id_th_ajaran = $req->id_th_ajaran;
		// $jadwal->th_ajaran = $req->th_ajaran;
		if ($jadwal->save()) {
			flash('Jadwal pendaftaran berhasil ditambahkan...')->success();
		} else {
			flash('Terjadi Kesalahan Sistem, Jadwal pendaftaran tidak dapat ditambahkan...')->danger();
		}

		return redirect(route('indexJadwalAdmin'));
    }

    public function detail($id){
    	$jadwal = JadwalPendaftaran::find($id);
    	return view('pages.admin.jadwal.detail', compact('jadwal'));
    }

    public function delete(Request $req){
    	$jadwal = JadwalPendaftaran::find($req->id_jadwal)->delete();
    	return redirect(route('indexJadwalAdmin'));
    }
}
