<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->string('head');
            $table->string('alamat');
            $table->string('nama_surat');
            $table->string('no_surat')->unique();
            $table->longText('konten');
            $table->date('tgl_surat');
            $table->string('tempat');
            $table->string('penanggung_jawab');
            $table->string('nip');
            $table->string('background');
            $table->string('logo');
            $table->string('ttd');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('surats');
    }
};
