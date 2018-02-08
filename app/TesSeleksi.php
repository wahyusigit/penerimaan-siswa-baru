<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TesSeleksi extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'no_tes_seleksi';
    protected $fillable = ['no_pendf','tgl_tes_akad','waktu_mulai','waktu_selesai','jumlah_benar','jumlah_salah','nilai_tes_seleksi','status_tes_seleksi'];

    public function calonsiswa(){
    	return $this->belongsTo(CalonSiswa::class,'no_pendf','no_pendf');
    }

    public function detail(){
    	return $this->belongsTo(DetailTesSeleksi::class,'no_tes_seleksi','no_tes_seleksi');
    }
}
