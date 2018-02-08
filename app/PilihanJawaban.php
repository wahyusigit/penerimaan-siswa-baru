<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PilihanJawaban extends Model
{
    // public $incrementing = false;
    protected $primaryKey = 'id_pilihan_jawaban';
    protected $fillable = ['id_pertanyaan','isi_jawaban','status_jawaban'];
    
    public function detailtesseleksi(){
    	return $this->hasOne(DetailTesSeleksi::class,'id_pilihan_jawaban','id_pilihan_jawaban');
    }
}
