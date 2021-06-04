<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasMahasiswaPertemuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas_mahasiswa_pertemuan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kelas_mahasiswa_id')->unsigned()->index();
            $table->foreign('kelas_mahasiswa_id')->references('id')->on('kelas_mahasiswa')->onDelete('cascade');;
            $table->bigInteger('pertemuan_id')->unsigned()->index();
            $table->foreign('pertemuan_id')->references('id')->on('pertemuan')->onDelete('cascade');;
            $table->time('jam_masuk');
            $table->time('jam_keluar');
            $table->integer('durasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas_mahasiswa_pertemuan');
    }
}
