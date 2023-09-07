<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama_pesanan');
            $table->integer('quantity');
            $table->integer('harga');
            $table->date('tanggal');
            $table->integer('nomor_meja');
            $table->string('keterangan');
            $table->integer('status'); //jika 1 maka sudah bayar, jika 0 maka belum
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
