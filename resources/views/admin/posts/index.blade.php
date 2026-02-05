@extends('layouts.app', ['title' => 'Kelola Artikel'])

@section('content')
<div class="max-w-7xl mx-auto page-transition">
    
    <!-- Header -->
    <div class="flex items-center justify-between mb-8 animate-slide-down">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">Kelola Artikel</h1>
            <p class="text-gray-600 dark:text-gray-400">Moderasi semua artikel dari pengguna</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn-secondary">
            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali
        </a>
    </div>

    <!-- Success/Error Message -->
    @if(session('success'))
        <div class="bg-green-100 dark:bg-green-900/30 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-400 px-6 py-4 rounded-lg mb-6 animate-slide-down">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 dark:bg-red-900/30 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-400 px-6 py-4 rounded-lg mb-6 animate-slide-down">
            {{ session('error') }}
        </div>
    @endif

    <!-- Filter & Search -->
    <x-glass-card class="mb-6 animate-slide-up delay-100">
        <form action="{{ route('admin.posts.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Cari artikel..."
                class="px-4 py-2 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 text-gray-800 dark:text-white"
            >
            <select name="status" class="px-4 py-2 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 text-gray-800 dark:text-white">
                <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua Status</option>
                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
            <button type="submit" class="btn-primary">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                Cari
            </button>
        </form>
    </x-glass-card>

    <!-- Posts List -->
    @if($posts->count() > 0)
        <div class="space-y-4">
            @foreach($posts as $index => $post)
                <x-glass-card class="hover-lift animate-slide-up" style="animation-delay: {{ $index * 50 }}ms;">
                    <div class="flex items-start gap-4">
                        <!-- Thumbnail -->
                        <div class="w-24 h-24 rounded-lg overflow-hidden flex-shrink-0 bg-gradient-to-br from-blue-400 to-purple-500">
                            @if($post->thumbnail)
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-3xl">
                                    {{ $post->category->icon }}
                                </div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="flex-1">
                            <div class="flex items-start justify-between mb-2">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-1">
                                        {{ $post->title }}
                                    </h3>
                                    <div class="flex items-center gap-3 text-sm text-gray-600 dark:text-gray-400">
                                        <span>{{ $post->author->name }}</span>
                                        <span>•</span>
                                        <span style="color: {{ $post->category->color }}">{{ $post->category->icon }} {{ $post->category->name }}</span>
                                        <span>•</span>
                                        <span>{{ $post->created_at->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Stats -->
                            <div class="flex items-center gap-4 text-sm text-gray-600 dark:text-gray-400 mb-3">
                                <span>👁️ {{ $post->views }}</span>
                                <span>❤️ {{ $post->likes->count() }}</span>
                                <span>💬 {{ $post->comments->count() }}</span>
                            </div>

                            <!-- Actions -->
                            <div class="flex items-center gap-2">
                                <!-- Status Badge -->
                                <span class="px-3 py-1 text-xs rounded {{ $post->status === 'published' ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400' : ($post->status === 'draft' ? 'bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400' : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-400') }}">
                                    {{ ucfirst($post->status) }}
                                </span>

                                <!-- Change Status -->
                                <form action="{{ route('admin.posts.updateStatus', $post) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" class="px-3 py-1 text-xs rounded bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 border-0 cursor-pointer">
                                        <option value="draft" {{ $post->status === 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="published" {{ $post->status === 'published' ? 'selected' : '' }}>Publish</option>
                                        <option value="archived" {{ $post->status === 'archived' ? 'selected' : '' }}>Archive</option>
                                    </select>
                                </form>

                                <!-- View -->
                                <a href="{{ route('posts.show', $post->slug) }}" class="px-3 py-1 text-xs bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded hover:bg-gray-300 dark:hover:bg-gray-600 transition" target="_blank">
                                    Lihat
                                </a>

                                <!-- Edit -->
                                <a href="{{ route('posts.edit', $post) }}" class="px-3 py-1 text-xs bg-blue-200 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 rounded hover:bg-blue-300 dark:hover:bg-blue-900/50 transition">
                                    Edit
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 text-xs bg-red-200 dark:bg-red-900/30 text-red-700 dark:text-red-400 rounded hover:bg-red-300 dark:hover:bg-red-900/50 transition">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </x-glass-card>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    @else
        <x-glass-card class="text-center py-16">
            <p class="text-gray-600 dark:text-gray-400">Tidak ada artikel yang ditemukan.</p>
        </x-glass-card>
    @endif

</div>
@endsection