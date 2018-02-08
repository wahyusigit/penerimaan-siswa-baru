<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_pendf',10)->unique();
            $table->enum('step_1',['complete','active','disabled'])->default('disabled');
            $table->enum('step_2',['complete','active','disabled'])->default('disabled');
            $table->enum('step_3',['complete','active','disabled'])->default('disabled');
            $table->enum('step_4',['complete','active','disabled'])->default('disabled');
            $table->enum('step_5',['complete','active','disabled'])->default('disabled');
            $table->enum('step_6',['complete','active','disabled'])->default('disabled');
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
        Schema::dropIfExists('steps');
    }
}
