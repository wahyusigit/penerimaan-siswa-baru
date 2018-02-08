<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Panitia extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'nip';
    protected $fillable = ['nip','id_user','nm_panitia','agama','alamat','no_hp'];

    public function pembayaran(){
    	return $this->belongsTo(Pembayaran::class,'nip','nip');
    }
}
