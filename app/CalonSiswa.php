<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kelas;

class CalonSiswa extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'no_pendf';
    protected $fillable = ['no_pendf','id_user','kd_jurusan','id_jadwal','kd_kelas','nm_cln_siswa','nisn','jns_kelamin','tmp_lahir','tgl_lahir','agama','alamat','nm_ortu','pkrj_ortu','gaji_ortu','sklh_asal'];

    public function jadwal(){
    	return $this->belongsTo(JadwalPendaftaran::class,'id_jadwal','id_jadwal');
    }

    public function jurusan(){
    	return $this->belongsTo(Jurusan::class,'kd_jurusan','kd_jurusan');
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class,'kd_kelas','kd_kelas');
    }

    public function user(){
    	return $this->belongsTo(User::class,'id_user','id_user');
    }

    public function pembayaran(){
        return $this->hasOne(Pembayaran::class,'no_pendf','no_pendf');
    }

    public function hasilTesSeleksi(){
        return $this->hasOne(HasilTesSeleksi::class,'no_pendf','no_pendf');
    }

    public function pilihanKelas($id_th_ajaran,$kd_jurusan){
        return Kelas::where('kd_jurusan',$kd_jurusan)->where('id_th_ajaran',$id_th_ajaran)->get();
    }

    public function daftarUlang(){
        return $this->hasOne(DaftarUlang::class,'no_pendf','no_pendf');   
    }

    public function qr(){
        return $this->belongsTo(QR::class,'no_pendf','no_pendf');
    }

    public function steps(){
        return $this->hasOne(Step::class,'no_pendf','no_pendf');
    }
    
    public function tesseleksi(){
        return $this->hasOne(TesSeleksi::class,'no_pendf','no_pendf');
    }    
}
