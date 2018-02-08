<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQRsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('q_r_s', function (Blueprint $table) {
            $table->uuid('qr_code');
            $table->string('qr_code_image');
            $table->enum('jenis',['pembayaran','tesseleksi','daftarulang']);
            $table->string('no_pendf',10);
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
        Schema::dropIfExists('q_rs');
    }
}
