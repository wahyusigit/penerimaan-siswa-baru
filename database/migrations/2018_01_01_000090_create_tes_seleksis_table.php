<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTesSeleksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tes_seleksis', function (Blueprint $table) {
            $table->string('no_tes_seleksi',10)->primary();
            $table->string('no_pendf',10)->unique();
            $table->date('tgl_tes_akad')->nullable();
            $table->time('waktu_mulai')->nullable();
            $table->time('waktu_selesai')->nullable();
            $table->tinyInteger('jumlah_benar')->nullable();
            $table->tinyInteger('jumlah_salah')->nullable();
            $table->tinyInteger('nilai_tes_seleksi')->nullable();
            $table->enum('status_tes_seleksi',['belum dimulai','sedang berjalan','selesai','sudah lewat'])->default('belum dimulai');
            $table->enum('status_kelulusan',['lulus','tidak lulus','belum'])->default('belum');
            $table->timestamps();

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
        Schema::dropIfExists('tes_seleksis');
    }
}
