<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('form_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tanggal');
            $table->time('jam_datang');
            $table->enum('status', ['Hadir', 'Izin', 'Sakit', 'Tanpa Keterangan'])->default('Hadir');
            $table->string('keterangan')->default('Absen Masuk');
            $table->longText('foto_muka')->nullable(); // Untuk menyimpan foto dalam bentuk base64
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('form_masuks');
    }
};
