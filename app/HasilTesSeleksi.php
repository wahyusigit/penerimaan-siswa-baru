<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HasilTesSeleksi extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'no_pendf';
    protected $fillable = ['no_pendf','tgl_tes_akad','nilai_tes_akad','sts_tes_akad'];

    public function calonSiswa(){
    	return $this->belongsTo(CalonSiswa::class,'no_pendf','no_pendf');
    }

    public function siswaLulus($id_jadwal){
    	$this->calonSiswa()->where('id_jadwal',$id_jadwal)->get();
    }
}
