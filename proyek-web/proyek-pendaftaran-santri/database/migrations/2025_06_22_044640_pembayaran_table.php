<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->foreignId('id_pendaftar')->constrained('pendaftar')->onDelete('cascade');
            $table->decimal('jumlah', 10, 2);
            $table->string('status')->default('pending');
            $table->string('bukti_bayar')->nullable();
            $table->timestamp('waktu_upload')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
};