<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'kd_jurusan';
    protected $fillable = ['kd_jurusan','nm_jurusan'];

    public function kelas(){
    	return $this->hasMany(Kelas::class,'kd_jurusan','kd_jurusan');
    }

    public function calonSiswa(){
    	return $this->hasMany(CalonSiswa::class,'kd_jurusan','kd_jurusan');
    }
}
