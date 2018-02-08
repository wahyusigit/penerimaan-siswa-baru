<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePilihanJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilihan_jawabans', function (Blueprint $table) {
            $table->increments('id_pilihan_jawaban');
            $table->unsignedInteger('id_pertanyaan');
            $table->string('isi_jawaban');
            $table->enum('status_jawaban',['benar','salah'])->default('salah');
            $table->timestamps();

            $table->foreign('id_pertanyaan')->references('id_pertanyaan')->on('pertanyaans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pilihan_jawabans');
    }
}
