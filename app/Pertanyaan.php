<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    // public $incrementing = false;
    protected $primaryKey = 'id_pertanyaan';
    protected $fillable = ['isi_pertanyaan'];

    public function pilihanJawaban(){
    	return $this->hasMany(PilihanJawaban::class,'id_pertanyaan','id_pertanyaan');
    }
}
