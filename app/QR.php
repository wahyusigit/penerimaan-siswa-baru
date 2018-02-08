<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QR extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'qr_code';
    protected $fillable = ['qr_code_image','jenis','no_pendf'];

    public function calonsiswa(){
    	return $this->belongsTo(CalonSiswa::class,'no_pendf','no_pendf');
    }
}
