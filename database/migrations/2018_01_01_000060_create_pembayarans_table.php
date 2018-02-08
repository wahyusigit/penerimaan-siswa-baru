<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            // $table->increments('id');
            $table->string('no_pemb',10)->primary(); // PK
            $table->string('no_pendf',10)->unique(); // FK
            $table->string('nip',5)->nullable();
            $table->string('nm_bank',12);
            $table->string('nm_pemilik_rek',32);
            $table->string('no_rek',15);
            $table->string('cbg_bank',15);
            $table->date('tgl_pembayaran');
            $table->enum('sts_verif',['sudah','belum'])->default('belum');
            $table->date('tgl_verif')->nullable();
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
        Schema::dropIfExists('pembayarans');
    }
}
