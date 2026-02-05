@extends('layouts.app', ['title' => 'Semua Artikel'])

@section('content')
<div class="max-w-7xl mx-auto page-transition">
    
    <!-- Header -->
    <div class="text-center mb-12 animate-slide-down">
        <h1 class="text-4xl md:text-6xl font-bold text-gray-800 dark:text-white mb-4">
            Jelajahi <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">Artikel</span>
        </h1>
        <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
            Temukan berbagai artikel menarik dari mahasiswa se-Indonesia
        </p>
    </div>

    <!-- Search & Filter -->
    <div class="mb-8 animate-slide-up delay-100">
        <form action="{{ route('blog.index') }}" method="GET" class="glass glass-dark rounded-2xl p-6 shadow-xl">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                <div class="md:col-span-9">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ request('search') }}"
                            placeholder="Cari artikel berdasarkan judul atau konten..."
                            class="w-full pl-12 pr-4 py-3 rounded-xl bg-white/70 dark:bg-gray-800/70 border-2 border-gray-200 dark:border-gray-700 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-4 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white placeholder-gray-400"
                        >
                    </div>
                </div>
                <div class="md:col-span-3 flex gap-2">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105 active:scale-95 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="hidden sm:inline">Cari</span>
                    </button>
                    @if(request()->hasAny(['search', 'category']))
                        <a href="{{ route('blog.index') }}" class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 px-4 py-3 rounded-xl font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition-all duration-300 hover:scale-105 active:scale-95 flex items-center justify-center" title="Reset Filter">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>

    <!-- Categories Chips -->
    <div class="mb-12 animate-fade-in">
        <h3 class="text-sm font-semibold text-gray-600 dark:text-gray-400 mb-4 uppercase tracking-wide">Filter Kategori</h3>
        <div class="flex items-center gap-3 overflow-x-auto pb-4 scrollbar-hide">
            <a href="{{ route('blog.index') }}" class="px-5 py-2.5 rounded-full font-medium transition-all duration-300 {{ !request('category') ? 'bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-lg scale-105' : 'bg-white/80 dark:bg-gray-800/80 text-gray-700 dark:text-gray-300 hover:bg-white dark:hover:bg-gray-800 hover:shadow-md' }} whitespace-nowrap hover:scale-105">
                ✨ Semua
            </a>
            @foreach($categories as $category)
                <a href="{{ route('blog.index', ['category' => $category->slug]) }}" 
                   class="px-5 py-2.5 rounded-full font-medium transition-all duration-300 whitespace-nowrap hover:scale-105 hover:shadow-md {{ request('category') == $category->slug ? 'text-white shadow-lg scale-105' : 'bg-white/80 dark:bg-gray-800/80 text-gray-700 dark:text-gray-300 hover:bg-white dark:hover:bg-gray-800' }}" 
                   style="{{ request('category') == $category->slug ? 'background: linear-gradient(135deg, ' . $category->color . ' 0%, ' . $category->color . 'dd 100%)' : '' }}">
                    {{ $category->icon }} {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>

    <!-- Posts Grid -->
    @if($posts->count() > 0)
        <div class="mb-6">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Menampilkan <span class="font-semibold text-gray-800 dark:text-white">{{ $posts->total() }}</span> artikel
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach($posts as $index => $post)
                <article class="group glass glass-dark rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-500 animate-scale-in hover:-translate-y-2" style="animation-delay: {{ $index * 50 }}ms;">
                    <!-- Thumbnail -->
                    <a href="{{ route('posts.show', $post->slug) }}" class="block relative overflow-hidden">
                        <div class="h-56 bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500 relative">
                            @if($post->thumbnail)
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" 
                                     alt="{{ $post->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-8xl group-hover:scale-110 transition-transform duration-700">
                                    {{ $post->category->icon }}
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        
                        <!-- Category Badge -->
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1.5 text-xs font-bold rounded-full backdrop-blur-md shadow-lg" style="background-color: {{ $post->category->color }}; color: white;">
                                {{ $post->category->icon }} {{ $post->category->name }}
                            </span>
                        </div>

                        <!-- Reading Time Badge -->
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1.5 text-xs font-semibold rounded-full bg-black/50 backdrop-blur-md text-white">
                                {{ $post->reading_time }} min
                            </span>
                        </div>
                    </a>

                    <!-- Content -->
                    <div class="p-6">
                        <!-- Author Info -->
                        <div class="flex items-center gap-3 mb-4">
                            <a href="{{ route('profile.show', $post->author->nim) }}" class="flex items-center gap-2 group/author">
                                <div class="w-10 h-10 rounded-full overflow-hidden ring-2 ring-gray-200 dark:ring-gray-700 group-hover/author:ring-blue-500 transition-all">
                                    @if($post->author->avatar)
                                        <img src="{{ asset('storage/' . $post->author->avatar) }}" 
                                             alt="{{ $post->author->name }}" 
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-bold">
                                            {{ substr($post->author->name, 0, 1) }}
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-800 dark:text-white group-hover/author:text-blue-600 dark:group-hover/author:text-blue-400 transition-colors">
                                        {{ $post->author->name }}
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-500">
                                        {{ $post->published_at->diffForHumans() }}
                                    </p>
                                </div>
                            </a>
                        </div>

                        <!-- Title -->
                        <a href="{{ route('posts.show', $post->slug) }}" class="block group/title">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 line-clamp-2 group-hover/title:text-blue-600 dark:group-hover/title:text-blue-400 transition-colors leading-tight">
                                {{ $post->title }}
                            </h3>
                        </a>

                        <!-- Excerpt -->
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4 line-clamp-3 leading-relaxed">
                            {{ $post->excerpt }}
                        </p>

                        <!-- Footer Stats -->
                        <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center gap-4 text-sm text-gray-600 dark:text-gray-400">
                                <span class="flex items-center gap-1.5 hover:text-red-500 transition-colors cursor-pointer" title="Likes">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $post->likes->count() }}
                                </span>
                                <span class="flex items-center gap-1.5 hover:text-blue-500 transition-colors cursor-pointer" title="Views">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    {{ $post->views }}
                                </span>
                                <span class="flex items-center gap-1.5 hover:text-green-500 transition-colors cursor-pointer" title="Comments">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                    {{ $post->comments->count() }}
                                </span>
                            </div>

                            <a href="{{ route('posts.show', $post->slug) }}" class="flex items-center gap-1 text-sm font-semibold text-blue-600 dark:text-blue-400 hover:gap-2 transition-all">
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

        <!-- Pagination -->
        <div class="flex justify-center mt-12">
            {{ $posts->links() }}
        </div>
    @else
        <!-- Empty State -->
        <div class="glass glass-dark rounded-2xl p-16 text-center animate-fade-in">
            <div class="w-24 h-24 bg-gradient-to-br from-blue-100 to-purple-100 dark:from-blue-900/30 dark:to-purple-900/30 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce-slow">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Tidak Ada Artikel Ditemukan</h3>
            <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">
                Belum ada artikel yang sesuai dengan pencarian Anda. Coba kata kunci lain atau hapus filter.
            </p>
            @if(request()->hasAny(['search', 'category']))
                <a href="{{ route('blog.index') }}" class="btn-primary inline-block">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Reset Filter
                </a>
            @endif
        </div>
    @endif

</div>
@endsection