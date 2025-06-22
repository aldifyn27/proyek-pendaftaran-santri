<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kartu_ujian', function (Blueprint $table) {
            $table->id('id_kartu');
            $table->foreignId('id_pendaftar')->constrained('pendaftar')->onDelete('cascade');
            $table->string('nomor_ujian')->unique();
            $table->date('tanggal_ujian');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kartu_ujian');
    }
};