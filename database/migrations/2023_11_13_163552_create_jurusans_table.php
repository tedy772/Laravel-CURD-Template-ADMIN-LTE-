<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurusan', function (Blueprint $table) {
            // membuat primary key dengan nama kolom id
            $table->bigIncrements('id');
            // membuat  2 kolom record, yakni create_at dan update_at
            $table->timestamps();
            // fungsi string menanbahakan kolom dengan tipe VARCHAR dan panjang 225 karakter
            $table->string('nama', 255);
            // fungsi text menambahkan kolom dengan tipe TEXT dengan default panang 65536 karakter
            $table->text('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurusan');
    }
}
