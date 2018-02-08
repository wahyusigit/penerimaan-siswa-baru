<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalonSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calon_siswas', function (Blueprint $table) {
            // $table->increments('id');
            $table->string('no_pendf',10)->primary(); //PK
            $table->unsignedInteger('id_user')->unique(); // ID Users // FK
            $table->string('kd_jurusan', 3); //  Kode Jurusan // FK
            $table->unsignedInteger('id_jadwal'); // ID Jadwal // FK
            $table->string('kd_kelas', 4)->nullable();
            $table->string('nm_cln_siswa', 20);
            $table->string('nisn', 10);
            $table->enum('jns_kelamin',['l','p']);
            $table->string('tmp_lahir', 12);
            $table->date('tgl_lahir');
            $table->enum('agama', ['islam','kristen','katolik','hindu','budha',]);
            $table->string('alamat', 120);
            $table->string('nm_ortu', 20);
            $table->string('pkrj_ortu', 10);
            $table->integer('gaji_ortu');
            $table->string('sklh_asal', 17);
            $table->enum('status_tes',['sudah','belum'])->default('belum');
            $table->enum('status_pembayaran',['sudah','belum'])->default('belum');
            $table->enum('status_penerimaan',['diterima','tidak diterima'])->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kd_jurusan')->references('kd_jurusan')->on('jurusans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwal_pendaftarans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kd_kelas')->references('kd_kelas')->on('kelas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calon_siswas');
    }
}
