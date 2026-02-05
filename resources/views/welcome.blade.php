@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto page-transition">
    
    <!-- Hero Section dengan Animasi -->
    <div class="relative text-center mb-20 pt-16 pb-8">
        <!-- Decorative Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none opacity-30 dark:opacity-20">
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl animate-float"></div>
            <div class="absolute top-40 right-10 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl animate-float" style="animation-delay: 2s;"></div>
            <div class="absolute -bottom-8 left-1/3 w-72 h-72 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl animate-float" style="animation-delay: 4s;"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10">
            <div class="inline-block mb-4 animate-slide-down">
                <span class="px-4 py-2 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-sm font-semibold">
                    🎓 Platform Publikasi Mahasiswa #1 di Parepare
                </span>
            </div>
            
            <h1 class="text-5xl md:text-7xl font-extrabold text-gray-800 dark:text-white mb-6 animate-slide-down delay-100">
                Selamat Datang di<br>
                <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent animate-gradient">
                    NIMpress
                </span>
            </h1>
            
            <p class="text-lg md:text-xl text-gray-600 dark:text-gray-400 mb-10 max-w-3xl mx-auto leading-relaxed animate-slide-up delay-200">
                Platform publikasi artikel mahasiswa untuk berbagi pengetahuan, pengalaman, dan karya ilmiah dengan mudah.
                Bergabung dengan <span class="font-semibold text-blue-600 dark:text-blue-400">ribuan mahasiswa</span> lainnya!
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center animate-slide-up delay-300">
                <a href="/register" class="group relative inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl overflow-hidden shadow-2xl hover:shadow-blue-500/50 transition-all duration-300 hover:scale-105 active:scale-95">
                    <span class="relative z-10 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                        </svg>
                        Mulai Menulis
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-purple-600 to-pink-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
                
                <a href="/artikel" class="inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl border-2 border-gray-200 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-400 transition-all duration-300 hover:scale-105 active:scale-95">
                    <span class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Jelajahi Artikel
                    </span>
                </a>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-3 gap-8 max-w-2xl mx-auto mt-16 animate-fade-in delay-400">
                <div class="text-center">
                    <p class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-1">
                        {{ \App\Models\Post::where('status', 'published')->count() }}+
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Artikel Published</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-1">
                        {{ \App\Models\User::where('role', 'mahasiswa')->count() }}+
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Mahasiswa Aktif</p>
                </div>
                <div class="text-center">
                    <p class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-1">
                        {{ \App\Models\Category::count() }}
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Kategori</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Features dengan Stagger Animation -->
    <div class="mb-20">
        <div class="text-center mb-12 animate-slide-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">
                Kenapa Memilih <span class="text-shimmer">NIMpress</span>?
            </h2>
            <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                Platform lengkap dengan fitur-fitur modern untuk mendukung publikasi karya ilmiah Anda
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="group glass glass-dark rounded-2xl p-8 hover:shadow-2xl transition-all duration-500 animate-slide-up delay-100 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-3 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                    Tulis Artikel
                </h3>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                    Ekspresikan ide dan pengetahuan Anda melalui artikel berkualitas dengan editor yang mudah digunakan dan fitur lengkap.
                </p>
            </div>
            
            <div class="group glass glass-dark rounded-2xl p-8 hover:shadow-2xl transition-all duration-500 animate-slide-up delay-200 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-3 group-hover:text-green-600 dark:group-hover:text-green-400 transition-colors">
                    Diskusi Aktif
                </h3>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                    Berinteraksi dengan pembaca melalui sistem komentar yang termoderasi dengan baik untuk diskusi yang berkualitas.
                </p>
            </div>
            
            <div class="group glass glass-dark rounded-2xl p-8 hover:shadow-2xl transition-all duration-500 animate-slide-up delay-300 hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-3 group-hover:text-red-600 dark:group-hover:text-red-400 transition-colors">
                    Export PDF
                </h3>
                <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                    Simpan artikel favorit dalam format PDF dengan design profesional untuk dibaca offline kapan saja.
                </p>
            </div>
        </div>
    </div>
    
    <!-- Categories Section -->
    <div class="mb-20 animate-fade-in">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">
                Kategori Populer
            </h2>
            <p class="text-gray-600 dark:text-gray-400">
                Temukan artikel dari berbagai kategori yang menarik
            </p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach(\App\Models\Category::all() as $index => $category)
                <a href="{{ route('blog.index', ['category' => $category->slug]) }}" 
                   class="group glass glass-dark rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-300 animate-scale-in hover:-translate-y-2" 
                   style="animation-delay: {{ $index * 50 }}ms;">
                    <div class="text-5xl mb-3 group-hover:scale-125 transition-transform duration-300">
                        {{ $category->icon }}
                    </div>
                    <h4 class="font-bold text-gray-800 dark:text-white mb-1 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                        {{ $category->name }}
                    </h4>
                    <p class="text-xs text-gray-600 dark:text-gray-400">
                        {{ $category->publishedPostsCount() }} artikel
                    </p>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Latest Posts Preview -->
    <div class="mb-20">
        <div class="flex items-center justify-between mb-10 animate-slide-up">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-2">
                    Artikel Terbaru
                </h2>
                <p class="text-gray-600 dark:text-gray-400">
                    Baca artikel terbaru dari mahasiswa se-Indonesia
                </p>
            </div>
            <a href="{{ route('blog.index') }}" class="hidden sm:flex items-center gap-2 text-blue-600 dark:text-blue-400 hover:gap-3 transition-all font-semibold group">
                Lihat Semua
                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
            @foreach(\App\Models\Post::published()->with(['category', 'author', 'likes'])->latest()->take(6)->get() as $index => $post)
                <article class="group glass glass-dark rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-500 animate-scale-in hover:-translate-y-2" style="animation-delay: {{ $index * 100 }}ms;">
                    <a href="{{ route('posts.show', $post->slug) }}" class="block">
                        <div class="relative h-52 bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500 overflow-hidden">
                            @if($post->thumbnail)
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" 
                                     alt="{{ $post->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-7xl group-hover:scale-110 transition-transform duration-700">
                                    {{ $post->category->icon }}
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1.5 text-xs font-bold rounded-full backdrop-blur-md shadow-lg" style="background-color: {{ $post->category->color }}; color: white;">
                                    {{ $post->category->name }}
                                </span>
                            </div>
                        </div>
                    </a>
                    
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full overflow-hidden ring-2 ring-gray-200 dark:ring-gray-700">
                                    @if($post->author->avatar)
                                        <img src="{{ asset('storage/' . $post->author->avatar) }}" alt="{{ $post->author->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white text-xs font-bold">
                                            {{ substr($post->author->name, 0, 1) }}
                                        </div>
                                    @endif
                                </div>
                                <span class="text-xs font-medium text-gray-700 dark:text-gray-300">
                                    {{ $post->author->name }}
                                </span>
                            </div>
                            <span class="text-xs text-gray-500">•</span>
                            <span class="text-xs text-gray-600 dark:text-gray-400">
                                {{ $post->reading_time }} min
                            </span>
                        </div>
                        
                        <a href="{{ route('posts.show', $post->slug) }}" class="block group/title">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2 line-clamp-2 group-hover/title:text-blue-600 dark:group-hover/title:text-blue-400 transition-colors leading-tight">
                                {{ $post->title }}
                            </h3>
                        </a>
                        
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4 line-clamp-2 leading-relaxed">
                            {{ $post->excerpt }}
                        </p>
                        
                        <div class="flex items-center justify-between text-sm text-gray-600 dark:text-gray-400 pt-4 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center gap-4">
                                <span class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $post->likes->count() }}
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    {{ $post->views }}
                                </span>
                            </div>
                            
                            <a href="{{ route('posts.show', $post->slug) }}" class="flex items-center gap-1 text-blue-600 dark:text-blue-400 font-semibold hover:gap-2 transition-all">
                                Baca
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="text-center sm:hidden">
            <a href="{{ route('blog.index') }}" class="btn-primary inline-flex items-center gap-2">
                Lihat Semua Artikel
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>

    <!-- CTA Section dengan Gradient Animation -->
    <div class="relative overflow-hidden rounded-3xl p-12 mb-8 animate-scale-in">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 animate-gradient"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMzYgMzBoLTJWMThoMnYxMnptLTYgMGgtMlYxOGgydjEyem0tNiAwSDIyVjE4aDJ2MTJ6bTMtNnYyaC0ydi0yaDF6Ii8+PC9nPjwvZz48L3N2Zz4=')] opacity-20"></div>
        
        <div class="relative z-10 text-center">
            <div class="inline-block px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-white text-sm font-semibold mb-4">
                ✨ Gratis Selamanya
            </div>
            <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-4">
                Siap Berbagi Pengetahuan?
            </h2>
            <p class="text-white/90 text-lg mb-8 max-w-2xl mx-auto">
                Bergabunglah dengan <span class="font-bold">ribuan mahasiswa</span> lainnya dan mulai publikasikan karya ilmiah Anda hari ini!
            </p>
            <a href="/register" class="inline-flex items-center gap-2 bg-white text-blue-600 px-8 py-4 rounded-xl font-bold shadow-2xl hover:shadow-white/50 hover:scale-105 active:scale-95 transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                Daftar Sekarang - Gratis!
            </a>
        </div>
    </div>
</div>

<style>
@keyframes gradient {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

.animate-gradient {
    background-size: 200% 200%;
    animation: gradient 8s ease infinite;
}
</style>
@endsection