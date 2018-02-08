<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaftarUlangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_ulangs', function (Blueprint $table) {
            $table->string('no_daftar_ulang')->primary();
            $table->string('nip',5)->nullable();
            $table->string('no_pendf',10)->unique();
            $table->string('scan_foto_3x4')->nullable();
            $table->string('scan_nisn')->nullable();
            $table->string('scan_kartu_keluarga')->nullable();
            $table->string('scan_akta')->nullable();
            $table->string('scan_ktp_ortu')->nullable();
            $table->string('scan_skhu')->nullable();
            $table->timestamps();

            $table->foreign('nip')->references('nip')->on('panitias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('no_pendf')->references('no_pendf')->on('calon_siswas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_ulangs');
    }
}
