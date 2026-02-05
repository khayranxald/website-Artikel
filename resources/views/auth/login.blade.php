@extends('layouts.auth', ['title' => 'Login'])

@section('content')
<div>
    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Selamat Datang Kembali!</h2>
    <p class="text-gray-600 dark:text-gray-400 mb-6">Masuk dengan NIM Anda</p>
    
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
    
    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 dark:bg-green-900/30 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-400 px-4 py-3 rounded-lg mb-4 text-sm">
            {{ session('success') }}
        </div>
    @endif
    
    <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
        @csrf
        
        <!-- NIM Input -->
        <div>
            <label for="nim" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                NIM
            </label>
            <input 
                type="text" 
                id="nim" 
                name="nim" 
                value="{{ old('nim') }}"
                required
                autofocus
                placeholder="Contoh: 220123456"
                class="w-full px-4 py-3 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white placeholder-gray-400"
            >
        </div>
        
        <!-- Password Input -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                Password
            </label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                required
                placeholder="Masukkan password Anda"
                class="w-full px-4 py-3 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white placeholder-gray-400"
            >
        </div>
        
        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label class="flex items-center">
                <input 
                    type="checkbox" 
                    name="remember" 
                    class="w-4 h-4 rounded border-gray-300 dark:border-gray-600 text-blue-600 focus:ring-blue-500 focus:ring-offset-0"
                >
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Ingat saya</span>
            </label>
            <a href="#" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">Lupa password?</a>
        </div>
        
        <!-- Submit Button -->
        <button type="submit" class="w-full btn-primary py-3 text-base">
            Masuk
        </button>
    </form>
    
    <!-- Register Link -->
    <div class="mt-6 text-center">
        <p class="text-gray-600 dark:text-gray-400 text-sm">
            Belum punya akun? 
            <a href="{{ route('register') }}" class="text-blue-600 dark:text-blue-400 font-semibold hover:underline">
                Daftar Sekarang
            </a>
        </p>
    </div>
</div>
@endsection