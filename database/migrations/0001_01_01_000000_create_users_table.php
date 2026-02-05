<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 20)->unique(); // NIM sebagai identifier utama
            $table->string('name');
            $table->string('email')->nullable(); // Email opsional
            $table->string('prodi')->nullable(); // Program Studi
            $table->string('angkatan', 4)->nullable(); // Tahun Angkatan
            $table->string('password');
            $table->enum('role', ['admin', 'mahasiswa'])->default('mahasiswa');
            $table->enum('theme', ['light', 'dark'])->default('light'); // Preferensi tema
            $table->string('avatar')->nullable(); // Foto profil
            $table->text('bio')->nullable(); // Biografi singkat
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};