@extends('layouts.auth', ['title' => 'Register'])

@section('content')
<div>
    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Daftar Akun Baru</h2>
    <p class="text-gray-600 dark:text-gray-400 mb-6">Mulai berbagi karya Anda</p>
    
    <!-- Error Messages -->
    @if($errors->any())
        <div class="bg-red-100 dark:bg-red-900/30 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-400 px-4 py-3 rounded-lg mb-4">
            <ul class="text-sm space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="POST" action="{{ route('register.post') }}" class="space-y-4">
        @csrf
        
        <!-- NIM Input -->
        <div>
            <label for="nim" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                NIM <span class="text-red-500">*</span>
            </label>
            <input 
                type="text" 
                id="nim" 
                name="nim" 
                value="{{ old('nim') }}"
                required
                placeholder="Contoh: 220123456"
                class="w-full px-4 py-2.5 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white placeholder-gray-400 text-sm"
            >
        </div>
        
        <!-- Name Input -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Nama Lengkap <span class="text-red-500">*</span>
            </label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                value="{{ old('name') }}"
                required
                placeholder="Nama lengkap Anda"
                class="w-full px-4 py-2.5 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white placeholder-gray-400 text-sm"
            >
        </div>
        
        <!-- Email Input (Optional) -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Email
            </label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                value="{{ old('email') }}"
                placeholder="email@example.com (opsional)"
                class="w-full px-4 py-2.5 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white placeholder-gray-400 text-sm"
            >
        </div>
        
        <!-- Prodi Input -->
        <div>
            <label for="prodi" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Program Studi
            </label>
            <input 
                type="text" 
                id="prodi" 
                name="prodi" 
                value="{{ old('prodi') }}"
                placeholder="Contoh: Teknik Informatika"
                class="w-full px-4 py-2.5 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white placeholder-gray-400 text-sm"
            >
        </div>
        
        <!-- Angkatan Input -->
        <div>
            <label for="angkatan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Angkatan
            </label>
            <input 
                type="text" 
                id="angkatan" 
                name="angkatan" 
                value="{{ old('angkatan') }}"
                placeholder="Contoh: 2022"
                maxlength="4"
                class="w-full px-4 py-2.5 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white placeholder-gray-400 text-sm"
            >
        </div>
        
        <!-- Password Input -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Password <span class="text-red-500">*</span>
            </label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                required
                placeholder="Minimal 8 karakter"
                class="w-full px-4 py-2.5 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white placeholder-gray-400 text-sm"
            >
        </div>
        
        <!-- Confirm Password Input -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Konfirmasi Password <span class="text-red-500">*</span>
            </label>
            <input 
                type="password" 
                id="password_confirmation" 
                name="password_confirmation" 
                required
                placeholder="Ketik ulang password"
                class="w-full px-4 py-2.5 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white placeholder-gray-400 text-sm"
            >
        </div>
        
        <!-- Submit Button -->
        <button type="submit" class="w-full btn-primary py-3 text-base mt-6">
            Daftar Sekarang
        </button>
    </form>
    
    <!-- Login Link -->
    <div class="mt-6 text-center">
        <p class="text-gray-600 dark:text-gray-400 text-sm">
            Sudah punya akun? 
            <a href="{{ route('login') }}" class="text-blue-600 dark:text-blue-400 font-semibold hover:underline">
                Masuk
            </a>
        </p>
    </div>
</div>
@endsection