@extends('layouts.app', ['title' => 'Artikel Saya'])

@section('content')
<div class="max-w-7xl mx-auto page-transition">
    
    <!-- Header -->
    <div class="relative mb-10">
        <div class="absolute -inset-3 bg-gradient-to-r from-blue-500/10 to-purple-500/10 rounded-3xl blur-xl"></div>
        <div class="relative flex flex-col md:flex-row md:items-center justify-between gap-6 p-8 glass-glass rounded-2xl">
            <div>
                <h1 class="text-4xl font-bold text-gray-800 dark:text-white mb-3">
                    <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Artikel Saya</span>
                </h1>
                <p class="text-gray-600 dark:text-gray-300 flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                    </svg>
                    Kelola dan pantau semua artikel Anda
                </p>
            </div>
            <a href="{{ route('posts.create') }}" class="group relative px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold rounded-xl hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
                <div class="absolute inset-0 bg-white/10 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <span class="relative flex items-center gap-2">
                    <svg class="w-5 h-5 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tulis Artikel Baru
                </span>
            </a>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="flex items-center gap-3 p-4 mb-8 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 border border-green-200 dark:border-green-800/50 rounded-xl animate-pulse">
            <div class="w-10 h-10 bg-green-100 dark:bg-green-900/40 rounded-full flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
            </div>
            <p class="text-green-700 dark:text-green-300 font-medium">{{ session('success') }}</p>
        </div>
    @endif

    <!-- Stats Summary -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="glass-glass p-4 rounded-xl">
            <div class="text-2xl font-bold text-gray-800 dark:text-white mb-1">{{ $posts->count() }}</div>
            <p class="text-sm text-gray-600 dark:text-gray-400">Total Artikel</p>
        </div>
        <div class="glass-glass p-4 rounded-xl">
            <div class="text-2xl font-bold text-emerald-500 mb-1">{{ $posts->where('status', 'published')->count() }}</div>
            <p class="text-sm text-gray-600 dark:text-gray-400">Dipublikasi</p>
        </div>
        <div class="glass-glass p-4 rounded-xl">
            <div class="text-2xl font-bold text-amber-500 mb-1">{{ $posts->where('status', 'draft')->count() }}</div>
            <p class="text-sm text-gray-600 dark:text-gray-400">Draft</p>
        </div>
        <div class="glass-glass p-4 rounded-xl">
            <div class="text-2xl font-bold text-rose-500 mb-1">{{ $posts->sum('views') }}</div>
            <p class="text-sm text-gray-600 dark:text-gray-400">Total Views</p>
        </div>
    </div>

    <!-- Posts List -->
    @if($posts->count() > 0)
        <div class="mb-10">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Daftar Artikel</h2>
                <span class="text-sm text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-800 px-3 py-1 rounded-lg">
                    {{ $posts->count() }} artikel
                </span>
            </div>

            <div class="space-y-6">
                @foreach($posts as $index => $post)
                <div class="group glass-glass rounded-2xl p-6 hover:shadow-xl hover:-translate-y-1 transition-all duration-500 animate-slide-up" 
                     style="animation-delay: {{ $index * 50 }}ms;">
                    
                    <div class="flex flex-col md:flex-row gap-6">
                        <!-- Thumbnail -->
                        <div class="md:w-40 md:h-40 w-full h-48 rounded-xl overflow-hidden flex-shrink-0">
                            @if($post->thumbnail)
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" 
                                     alt="{{ $post->title }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                                    <span class="text-5xl text-white/90">{{ $post->category->icon }}</span>
                                </div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="flex-1">
                            <!-- Header -->
                            <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4 mb-4">
                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-3 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                        {{ $post->title }}
                                    </h3>
                                    <div class="flex flex-wrap items-center gap-2">
                                        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-medium {{ $post->status === 'published' ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400' : 'bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400' }}">
                                            <span class="w-2 h-2 rounded-full {{ $post->status === 'published' ? 'bg-green-500' : 'bg-yellow-500' }}"></span>
                                            {{ ucfirst($post->status) }}
                                        </span>
                                        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-medium" 
                                              style="background-color: {{ $post->category->color }}15; color: {{ $post->category->color }};">
                                            {{ $post->category->icon }} {{ $post->category->name }}
                                        </span>
                                        <span class="text-sm text-gray-500 dark:text-gray-400">
                                            {{ $post->published_at ? $post->published_at->format('d M Y') : 'Belum dipublikasi' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Excerpt -->
                            <p class="text-gray-600 dark:text-gray-300 mb-6 line-clamp-2">
                                {{ $post->excerpt }}
                            </p>

                            <!-- Stats & Actions -->
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pt-6 border-t border-gray-200/50 dark:border-gray-700/50">
                                <!-- Stats -->
                                <div class="flex items-center gap-4">
                                    <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                                        <div class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </div>
                                        <span class="font-medium">{{ $post->views }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                                        <div class="w-8 h-8 rounded-lg bg-rose-50 dark:bg-rose-900/20 flex items-center justify-center">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                            </svg>
                                        </div>
                                        <span class="font-medium">{{ $post->likes->count() }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-gray-600 dark:text-gray-400">
                                        <div class="w-8 h-8 rounded-lg bg-emerald-50 dark:bg-emerald-900/20 flex items-center justify-center">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                            </svg>
                                        </div>
                                        <span class="font-medium">{{ $post->comments->count() }}</span>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('posts.show', $post->slug) }}" 
                                       target="_blank"
                                       class="px-4 py-2 text-sm font-medium rounded-lg bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 hover:bg-blue-100 dark:hover:bg-blue-900/40 transition-colors">
                                        Lihat
                                    </a>
                                    <a href="{{ route('posts.edit', $post) }}" 
                                       class="px-4 py-2 text-sm font-medium rounded-lg bg-amber-50 dark:bg-amber-900/20 text-amber-600 dark:text-amber-400 hover:bg-amber-100 dark:hover:bg-amber-900/40 transition-colors">
                                        Edit
                                    </a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST" 
                                          onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="px-4 py-2 text-sm font-medium rounded-lg bg-rose-50 dark:bg-rose-900/20 text-rose-600 dark:text-rose-400 hover:bg-rose-100 dark:hover:bg-rose-900/40 transition-colors">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-10">
            {{ $posts->links() }}
        </div>
    @else
        <!-- Empty State -->
        <div class="text-center py-16">
            <div class="w-24 h-24 mx-auto mb-6">
                <div class="w-full h-full bg-gradient-to-br from-blue-100 to-purple-100 dark:from-blue-900/20 dark:to-purple-900/20 rounded-full flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-400 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                </div>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-3">Belum Ada Artikel</h3>
            <p class="text-gray-600 dark:text-gray-300 mb-8 max-w-md mx-auto">
                Mulai perjalanan menulis Anda dan bagikan pengetahuan dengan komunitas.
            </p>
            <a href="{{ route('posts.create') }}" 
               class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold rounded-xl hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tulis Artikel Pertama
            </a>
        </div>
    @endif

</div>

<!-- Custom Styles -->
<style>
.glass-glass {
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

.dark .glass-glass {
    background: rgba(15, 23, 42, 0.7);
    border: 1px solid rgba(255, 255, 255, 0.1);
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

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
@endsection