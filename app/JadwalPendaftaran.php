<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalPendaftaran extends Model
{
    // public $incrementing = false;
    protected $primaryKey = 'id_jadwal';
    protected $fillable = ['id_jadwal','nm_jadwal','th_ajaran','tgl_mulai_pendf','tgl_akhir_pendf','tgl_mulai_tes','tgl_akhir_tes','tgl_hasil_seleksi'];

    public function calonSiswa(){
    	return $this->hasMany(CalonSiswa::class,'id_jadwal','id_jadwal');
    }

    public function tahunAjaran(){
    	return $this->belongsTo(TahunAjaran::class,'id_th_ajaran','id_th_ajaran');
    }
}
