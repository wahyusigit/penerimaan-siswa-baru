<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\TahunAjaran;
use App\JadwalPendaftaran;
use App\CalonSiswa;
use App\TesSeleksi;

use DB;
use Carbon\Carbon;

class SeleksiPenerimaanController extends Controller
{
	private $carbon;

    public function __construct(){
        $this->carbon = Carbon::now();
    }

    public function index(){
    	$jadwal_terbuka = DB::table('jadwal_pendaftarans')
                    ->whereDate('tgl_mulai_pendf','<=',$this->carbon)
                    ->whereDate('tgl_hasil_seleksi','>=',$this->carbon)
                    ->first();
        if (is_null($jadwal_terbuka)) {
            $id_jadwal_terbuka = JadwalPendaftaran::orderBy('created_at','desc')->first()->id_jadwal;
        } else {
            $id_jadwal_terbuka = $jadwal_terbuka->id_jadwal;
        }

    	$tahunajarans = TahunAjaran::all();
        $jadwal = JadwalPendaftaran::find($id_jadwal_terbuka);

        $no_pendf_siswa_lulus = DB::table('tes_seleksis')
        					->join('calon_siswas','calon_siswas.no_pendf','tes_seleksis.no_pendf')
        					->join('jadwal_pendaftarans','jadwal_pendaftarans.id_jadwal','calon_siswas.id_jadwal')
        					->join('tahun_ajarans','tahun_ajarans.id_th_ajaran','jadwal_pendaftarans.id_th_ajaran')
                            ->where('jadwal_pendaftarans.id_jadwal',$id_jadwal_terbuka)

                            ->where(function ($query){
                                    $query->where('calon_siswas.status_penerimaan','tidak diterima')->orWhere('calon_siswas.status_penerimaan',null);
                                    })
        					// ->where('calon_siswas.status_penerimaan','tidak diterima')->orWhere('calon_siswas.status_penerimaan',null)
        					->select('calon_siswas.no_pendf','tahun_ajarans.id_th_ajaran','calon_siswas.kd_jurusan')
        					->get();


                            // DB::table('users')
                            //     ->where(function ($query){
                            //         $query->where('activated', '=', $activated);
                            //     })->get();


		foreach ($no_pendf_siswa_lulus as $i=>$value) {
			$backdatas['no_pendf'][$i] = $value->no_pendf;
			$backdatas['id_th_ajaran'][$i] = $value->id_th_ajaran;
			$backdatas['kd_jurusan'][$i] = $value->kd_jurusan;
		}
		// dd($backdatas);
		if (isset($backdatas)) {
			$belum_diterima = CalonSiswa::find($backdatas['no_pendf']);	
		} else {
			$belum_diterima = "";
		}

		$sudah_diterima = CalonSiswa::where('id_jadwal', $id_jadwal_terbuka)->where('status_penerimaan','diterima')->get();       
    	return view('pages.admin.seleksipenerimaan.index', compact('tahunajarans','jadwal','belum_diterima','sudah_diterima','backdatas'));
    }

    public function postPenerimaan(Request $req){
    	foreach ($req->data as $data) {
    		if ($data['status_penerimaan'] == "tidak diterima") {
    			$calonsiswa = CalonSiswa::find($data['no_pendf']);
	            $calonsiswa->status_penerimaan = $data['status_penerimaan'];
	            $calonsiswa->kd_kelas = null;
	            $calonsiswa->save();	
    		} elseif($data['status_penerimaan'] == "diterima") {
    			$calonsiswa = CalonSiswa::find($data['no_pendf']);
	            $calonsiswa->status_penerimaan = $data['status_penerimaan'];
	            $calonsiswa->kd_kelas = $data['kd_kelas'];
	            $calonsiswa->save();	
    		} else {
                
            }
        }
        return redirect(route('indexSeleksiPenerimaanAdmin'));
    }
}
