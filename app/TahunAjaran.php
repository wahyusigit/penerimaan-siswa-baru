<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    // public $incrementing = false;
    protected $primaryKey = 'id_th_ajaran';
    protected $fillable = ['id_th_ajaran','th_ajaran'];

    public function jadwal(){
    	return $this->hasMany(JadwalPendaftaran::class,'id_th_ajaran','id_th_ajaran');
    }

    public function kelas(){
    	return $this->hasMany(Kelas::class,'id_th_ajaran','id_th_ajaran');
    }

 	// public function siswa(){
  //   	return $this->jadwal();
  //   }
}
