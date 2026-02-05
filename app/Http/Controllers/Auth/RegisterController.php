<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|string|max:20|unique:users,nim',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email',
            'prodi' => 'nullable|string|max:255',
            'angkatan' => 'nullable|string|max:4',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'nim.required' => 'NIM wajib diisi.',
            'nim.unique' => 'NIM sudah terdaftar.',
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::create([
            'nim' => $validated['nim'],
            'name' => $validated['name'],
            'email' => $validated['email'] ?? null,
            'prodi' => $validated['prodi'] ?? null,
            'angkatan' => $validated['angkatan'] ?? null,
            'password' => Hash::make($validated['password']),
            'role' => 'mahasiswa', // Default role
        ]);

        // Auto login setelah register
        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Akun berhasil dibuat! Selamat datang di NIMpress.');
    }
}