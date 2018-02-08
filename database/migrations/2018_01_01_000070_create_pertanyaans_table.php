<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePertanyaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaans', function (Blueprint $table) {
            $table->increments('id_pertanyaan');
            $table->unsignedInteger('id_jenis_pertanyaan')->nullable();
            $table->longText('isi_pertanyaan');
            // $table->enum('mata_pelajaran',['matematika','ipa','bahasa inggris','bahasa indonesia']);
            $table->timestamps();

            $table->foreign('id_jenis_pertanyaan')->references('id_jenis_pertanyaan')->on('jenis_pertanyaans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertanyaans');
    }
}
