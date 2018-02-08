<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTesSeleksi extends Model
{
    // public $incrementing = false;
    protected $primaryKey = 'id_detail_tes_seleksi';
    protected $fillable = ['no_tes_seleksi','id_pertanyaan','id_pilihan_jawaban'];

    public function pilihanjawaban(){
    	return $this->belongsTo(PilihanJawaban::class,'id_pilihan_jawaban','id_pilihan_jawaban');
    }

    public function pertanyaan(){
    	return $this->belongsTo(Pertanyaan::class,'id_pertanyaan','id_pertanyaan');
    }
}
