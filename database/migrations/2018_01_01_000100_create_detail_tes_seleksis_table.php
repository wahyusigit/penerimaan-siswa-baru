<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailTesSeleksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_tes_seleksis', function (Blueprint $table) {
            $table->increments('id_detail_tes_seleksi');
            $table->string('no_tes_seleksi',10);
            $table->unsignedInteger('id_pertanyaan');
            $table->unsignedInteger('id_pilihan_jawaban')->nullable();
            $table->timestamps();

            $table->foreign('no_tes_seleksi')->references('no_tes_seleksi')->on('tes_seleksis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pertanyaan')->references('id_pertanyaan')->on('pertanyaans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pilihan_jawaban')->references('id_pilihan_jawaban')->on('pilihan_jawabans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_tes_seleksis');
    }
}
