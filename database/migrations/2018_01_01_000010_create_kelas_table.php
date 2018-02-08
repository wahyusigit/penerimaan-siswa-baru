<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->string('kd_kelas')->primary(); //PK
            $table->string('kd_jurusan',4); //FK
            $table->string('nm_kelas',32);
            $table->unsignedInteger('id_th_ajaran');
            $table->timestamps();

            $table->foreign('kd_jurusan')->references('kd_jurusan')->on('jurusans')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('kelas');
    }
}
