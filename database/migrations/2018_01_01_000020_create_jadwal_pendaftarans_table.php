<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalPendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_pendaftarans', function (Blueprint $table) {
            $table->increments('id_jadwal');
            $table->string('nm_jadwal',14);
            $table->unsignedInteger('id_th_ajaran');
            $table->date('tgl_mulai_pendf');
            $table->date('tgl_akhir_pendf');
            $table->date('tgl_mulai_tes');
            $table->date('tgl_akhir_tes');
            $table->date('tgl_hasil_seleksi');
            $table->timestamps();

            $table->foreign('id_th_ajaran')->references('id_th_ajaran')->on('tahun_ajarans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_pendaftarans');
    }
}
