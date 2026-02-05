<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
        'nim' => 'ADMIN001',
        'name' => 'Administrator',
        'email' => 'admin@nimpress.id',
        'password' => Hash::make('admin123'),
        'role' => 'admin',
        'theme' => 'dark', // Set default theme
        'prodi' => 'System Administrator',
        'angkatan' => date('Y'),
    ]);

        // Sample Mahasiswa
        User::create([
            'nim' => '220123456',
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
            'prodi' => 'Teknik Informatika',
            'angkatan' => '2022',
        ]);
    }
}