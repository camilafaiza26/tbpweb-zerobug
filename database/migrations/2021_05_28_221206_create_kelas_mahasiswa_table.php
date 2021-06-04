<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mahasiswa_id')->unsigned()->index();
            $table->foreign('mahasiswa_id')->references('id')->on('users')->onDelete('cascade');;
            $table->bigInteger('kelas_id')->unsigned()->index();
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');;
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
        Schema::dropIfExists('kelas_mahasiswa');
    }
}
