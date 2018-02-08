<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'no_pemb';
    protected $fillable = ['no_pemb','nip','nm_bank','nm_pemilik_rek','no_rek','cbg_bank','tgl_pembayaran','sts_verif'];

    public function calonsiswa(){
    	return $this->belongsTo(CalonSiswa::class,'no_pendf','no_pendf');
    }

    public function panitia(){
    	return $this->belongsTo(Panitia::class,'nip','nip');	
    }
}
