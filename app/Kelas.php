<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'kd_kelas';
    protected $fillable = ['kd_kelas','kd_jurusan','nm_kelas','th_ajaran'];

    public function tahunAjaran(){
    	return $this->belongsTo(TahunAjaran::class,'id_th_ajaran','id_th_ajaran');
    }

    public function jurusan(){
    	return $this->belongsTo(Jurusan::class,'kd_jurusan','kd_jurusan');
    }

    public function siswa(){
    	return $this->hasMany(CalonSiswa::class,'kd_kelas','kd_kelas');
    }
}
