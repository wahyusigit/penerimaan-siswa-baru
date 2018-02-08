<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePanitiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panitias', function (Blueprint $table) {
            // $table->increments('id');
            $table->string('nip',5)->primary(); // PK
            $table->unsignedInteger('id_user')->unique();  // FK
            $table->string('nm_panitia',20);
            $table->enum('jns_kelamin',['l','p']);
            $table->enum('agama', ['islam','kristen','katolik','hindu','budha',]);
            $table->string('alamat',120);
            $table->string('no_hp',12);
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('panitias');
    }
}
