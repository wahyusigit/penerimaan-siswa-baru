<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarUlang extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'no_daftar_ulang';
    protected $fillable = ['nip','no_pendf','scan_foto_3x4','scan_kartu_keluarga','scan_ktp_ortu','scan_akta','scan_nisn','scan_skhu'];
}
