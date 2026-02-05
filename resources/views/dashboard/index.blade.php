@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
<div class="max-w-7xl mx-auto page-transition">
    
    <!-- Welcome Banner -->
    <div class="relative overflow-hidden mb-8 animate-slide-down">
        <div class="absolute -inset-1 bg-gradient-to-r from-blue-500/20 via-purple-500/20 to-pink-500/20 blur-2xl rounded-3xl"></div>
        <x-glass-card class="relative">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="flex-1">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="relative">
                            <div class="w-16 h-16 rounded-2xl border-4 border-white/20 shadow-xl overflow-hidden">
                                @if(auth()->user()->avatar)
                                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" 
                                         alt="{{ auth()->user()->name }}" 
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                                        <span class="text-2xl font-bold text-white">{{ substr(auth()->user()->name, 0, 1) }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="absolute -bottom-2 -right-2 w-6 h-6 bg-gradient-to-br from-green-400 to-blue-500 rounded-full border-2 border-white dark:border-gray-800 flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-1">
                                Halo, <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600">{{ auth()->user()->name }}</span>! ✨
                            </h1>
                            <p class="text-gray-600 dark:text-gray-300 flex items-center gap-2">
                                <span class="px-2 py-1 bg-gray-100 dark:bg-gray-800 rounded-lg text-sm font-mono">
                                    {{ auth()->user()->nim }}
                                </span>
                                <span class="text-gray-500">•</span>
                                <span>{{ auth()->user()->prodi ?? 'Belum memilih prodi' }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-50 to-purple-50 dark:from-blue-900/20 dark:to-purple-900/20 rounded-xl border border-blue-100 dark:border-blue-800/30">
                        <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm text-gray-600 dark:text-gray-300">Selamat datang kembali! Terus berkarya dan berbagi ilmu.</span>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="relative group">
                    @csrf
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-red-500 to-pink-600 rounded-xl blur opacity-0 group-hover:opacity-70 transition duration-500"></div>
                    <button type="submit" 
                            class="relative flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-xl border border-gray-200 dark:border-gray-700 hover:shadow-lg transition-all duration-300 group-hover:-translate-y-0.5">
                        <svg class="w-5 h-5 text-red-500 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span class="font-semibold text-gray-700 dark:text-gray-300 group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors">
                            Keluar
                        </span>
                    </button>
                </form>
            </div>
        </x-glass-card>
    </div>
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        
        <!-- Total Articles Card -->
        <div class="relative group animate-slide-up delay-100">
            <div class="absolute -inset-0.5 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl blur opacity-0 group-hover:opacity-50 transition duration-500"></div>
            <x-glass-card class="relative h-full hover-lift">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2 flex items-center gap-2">
                            <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                            Total Artikel
                        </p>
                        <div class="flex items-baseline gap-2 mb-1">
                            <p class="text-4xl font-bold text-gray-800 dark:text-white">{{ auth()->user()->posts()->count() }}</p>
                            <span class="text-sm font-medium px-2 py-1 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400">
                                +{{ auth()->user()->posts()->where('status', 'published')->count() }} publik
                            </span>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-500">
                            {{ auth()->user()->posts()->where('status', 'draft')->count() }} draft tersimpan
                        </p>
                    </div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <div class="absolute inset-0 bg-white/10 rounded-2xl"></div>
                            <svg class="w-8 h-8 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-200/50 dark:border-gray-700/50">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Trend artikel</span>
                        <span class="font-medium text-green-500 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/>
                            </svg>
                            ↑ 12%
                        </span>
                    </div>
                </div>
            </x-glass-card>
        </div>
        
        <!-- Views Card -->
        <div class="relative group animate-slide-up delay-200">
            <div class="absolute -inset-0.5 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl blur opacity-0 group-hover:opacity-50 transition duration-500"></div>
            <x-glass-card class="relative h-full hover-lift">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2 flex items-center gap-2">
                            <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                            Total Dilihat
                        </p>
                        <div class="flex items-baseline gap-2 mb-1">
                            <p class="text-4xl font-bold text-gray-800 dark:text-white">{{ auth()->user()->totalViewsReceived() }}</p>
                            <span class="text-sm font-medium px-2 py-1 rounded-full bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400">
                                ↑ {{ floor(auth()->user()->totalViewsReceived() / 7) }} hari ini
                            </span>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-500">
                            Dari semua artikel yang dipublikasikan
                        </p>
                    </div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <div class="absolute inset-0 bg-white/10 rounded-2xl"></div>
                            <svg class="w-8 h-8 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-200/50 dark:border-gray-700/50">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500">Tren pembaca</span>
                        <div class="flex items-center gap-1">
                            <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                            <span class="font-medium text-emerald-500">Aktif</span>
                        </div>
                    </div>
                </div>
            </x-glass-card>
        </div>
        
        <!-- Likes Card -->
        <div class="relative group animate-slide-up delay-300">
            <div class="absolute -inset-0.5 bg-gradient-to-br from-rose-500 to-pink-600 rounded-2xl blur opacity-0 group-hover:opacity-50 transition duration-500"></div>
            <x-glass-card class="relative h-full hover-lift">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2 flex items-center gap-2">
                            <span class="w-2 h-2 bg-rose-500 rounded-full"></span>
                            Total Apresiasi
                        </p>
                        <div class="flex items-baseline gap-2 mb-1">
                            <p class="text-4xl font-bold text-gray-800 dark:text-white">{{ auth()->user()->totalLikesReceived() }}</p>
                            <span class="text-sm font-medium px-2 py-1 rounded-full bg-rose-100 dark:bg-rose-900/30 text-rose-600 dark:text-rose-400">
                                ❤️ {{ floor(auth()->user()->totalLikesReceived() / 30) }} bulan ini
                            </span>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-500">
                            Dari semua pembaca yang menyukai artikel
                        </p>
                    </div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-rose-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <div class="absolute inset-0 bg-white/10 rounded-2xl"></div>
                            <svg class="w-8 h-8 text-white relative z-10" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-200/50 dark:border-gray-700/50">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500">Engagement rate</span>
                        <span class="font-medium text-rose-500 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12 13a1 1 0 100 2h5a1 1 0 001-1V9a1 1 0 10-2 0v2.586l-4.293-4.293a1 1 0 00-1.414 0L8 9.586 3.707 5.293a1 1 0 00-1.414 1.414l5 5a1 1 0 001.414 0L11 9.414 14.586 13H12z" clip-rule="evenodd"/>
                            </svg>
                            ↑ 24%
                        </span>
                    </div>
                </div>
            </x-glass-card>
        </div>
        
    </div>
    
    <!-- Quick Actions -->
    <div class="mb-8 animate-fade-in">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Aksi Cepat</h2>
            <span class="text-sm text-gray-500 dark:text-gray-400 px-3 py-1 bg-gray-100 dark:bg-gray-800 rounded-lg">
                Akses cepat
            </span>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Write Article -->
            <a href="#" 
               class="group relative overflow-hidden rounded-2xl transition-all duration-500 hover:shadow-2xl hover:-translate-y-1">
                <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 via-purple-500/5 to-pink-500/5 group-hover:from-blue-500/10 group-hover:via-purple-500/10 group-hover:to-pink-500/10"></div>
                <div class="relative glass glass-dark rounded-2xl p-6">
                    <div class="flex items-start gap-4">
                        <div class="relative">
                            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 to-transparent rounded-xl"></div>
                                <svg class="w-7 h-7 text-white relative z-10 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                Tulis Artikel Baru
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">
                                Mulai berbagi pengetahuan, pengalaman, dan ide Anda dengan komunitas.
                            </p>
                            <span class="inline-flex items-center gap-2 text-sm font-medium text-blue-600 dark:text-blue-400 group-hover:gap-3 transition-all">
                                Mulai menulis
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            
            <!-- Edit Profile -->
            <a href="#" 
               class="group relative overflow-hidden rounded-2xl transition-all duration-500 hover:shadow-2xl hover:-translate-y-1">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 via-pink-500/5 to-rose-500/5 group-hover:from-purple-500/10 group-hover:via-pink-500/10 group-hover:to-rose-500/10"></div>
                <div class="relative glass glass-dark rounded-2xl p-6">
                    <div class="flex items-start gap-4">
                        <div class="relative">
                            <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <div class="absolute inset-0 bg-gradient-to-br from-white/20 to-transparent rounded-xl"></div>
                                <svg class="w-7 h-7 text-white relative z-10 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2 group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors">
                                Edit Profil
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">
                                Perbarui informasi akun, foto profil, dan preferensi Anda.
                            </p>
                            <span class="inline-flex items-center gap-2 text-sm font-medium text-purple-600 dark:text-purple-400 group-hover:gap-3 transition-all">
                                Edit sekarang
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    
    <!-- Recent Articles -->
    <div class="animate-slide-up">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Artikel Terbaru</h2>
            <a href="#" class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 flex items-center gap-2">
                Lihat semua
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </a>
        </div>
        
        @if(auth()->user()->posts()->count() > 0)
            <x-glass-card class="overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-600 dark:text-gray-400">Judul Artikel</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-600 dark:text-gray-400">Status</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-600 dark:text-gray-400">Interaksi</th>
                                <th class="text-left py-4 px-6 text-sm font-semibold text-gray-600 dark:text-gray-400">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200/50 dark:divide-gray-700/50">
                            @foreach(auth()->user()->posts()->latest()->take(5)->get() as $post)
                                <tr class="group hover:bg-gray-50 dark:hover:bg-gray-800/30 transition-colors">
                                    <td class="py-4 px-6">
                                        <div>
                                            <h4 class="font-semibold text-gray-800 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                                {{ $post->title }}
                                            </h4>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                                {{ $post->created_at->format('d M Y • H:i') }}
                                            </p>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-medium {{ $post->status === 'published' ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400' : 'bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400' }}">
                                            <span class="w-2 h-2 rounded-full {{ $post->status === 'published' ? 'bg-green-500' : 'bg-yellow-500' }}"></span>
                                            {{ ucfirst($post->status) }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center gap-4">
                                            <span class="flex items-center gap-1.5 text-sm text-gray-600 dark:text-gray-400">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                {{ $post->views }}
                                            </span>
                                            <span class="flex items-center gap-1.5 text-sm text-gray-600 dark:text-gray-400 group/like hover:text-rose-500 transition-colors">
                                                <svg class="w-4 h-4 group-hover/like:fill-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                                </svg>
                                                {{ $post->likes->count() }}
                                            </span>
                                            <span class="flex items-center gap-1.5 text-sm text-gray-600 dark:text-gray-400">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                                </svg>
                                                {{ $post->comments->count() }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center gap-2">
                                            <a href="#" 
                                               class="px-4 py-2 text-sm font-medium rounded-lg bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 hover:bg-blue-100 dark:hover:bg-blue-900/50 transition-colors">
                                                Edit
                                            </a>
                                            <a href="#" 
                                               class="px-4 py-2 text-sm font-medium rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
                                                Lihat
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </x-glass-card>
        @else
            <!-- Empty State -->
            <x-glass-card class="text-center py-16">
                <div class="max-w-md mx-auto">
                    <div class="w-24 h-24 mx-auto mb-6 relative">
                        <div class="absolute inset-0 bg-gradient-to-br from-gray-200 to-gray-300 dark:from-gray-800 dark:to-gray-900 rounded-full animate-pulse-slow"></div>
                        <div class="relative w-full h-full bg-gradient-to-br from-blue-50 to-purple-50 dark:from-blue-900/20 dark:to-purple-900/20 rounded-full flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-400 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-3">Mulai Berkarya!</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                        Anda belum memiliki artikel. Mulai perjalanan menulis Anda dan bagikan pengetahuan dengan komunitas.
                    </p>
                    <a href="#" 
                       class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold rounded-xl hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300 group">
                        <svg class="w-5 h-5 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tulis Artikel Pertama
                    </a>
                </div>
            </x-glass-card>
        @endif
    </div>
</div>

<!-- Custom CSS -->
<style>
.glass-dark {
    background: rgba(15, 23, 42, 0.6);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.hover-lift {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.hover-lift:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.text-shimmer {
    background: linear-gradient(90deg, #3b82f6, #8b5cf6, #3b82f6);
    background-size: 200% 100%;
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: shimmer 3s infinite linear;
}

@keyframes shimmer {
    0% { background-position: 200% 0; }
    100% { background-position: -200% 0; }
}

.page-transition {
    animation: pageSlide 0.6s ease-out;
}

@keyframes pageSlide {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-slide-up {
    animation: slideUp 0.6s ease-out;
}

.animate-slide-down {
    animation: slideDown 0.6s ease-out;
}

.animate-fade-in {
    animation: fadeIn 0.8s ease-out;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

.delay-100 { animation-delay: 0.1s; }
.delay-200 { animation-delay: 0.2s; }
.delay-300 { animation-delay: 0.3s; }
</style>
@endsection