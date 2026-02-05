@extends('layouts.app', ['title' => $user->name])

@section('content')
<div class="max-w-7xl mx-auto page-transition">
    
    <!-- Profile Header -->
    <x-glass-card class="mb-8 animate-slide-down">
        <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
            <!-- Avatar -->
            <div class="w-32 h-32 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center flex-shrink-0 overflow-hidden">
                @if($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                @else
                    <span class="text-white font-bold text-5xl">{{ substr($user->name, 0, 1) }}</span>
                @endif
            </div>

            <!-- User Info -->
            <div class="flex-1 text-center md:text-left">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">{{ $user->name }}</h1>
                <div class="flex flex-wrap justify-center md:justify-start gap-3 text-sm text-gray-600 dark:text-gray-400 mb-3">
                    <span class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                        </svg>
                        NIM: {{ $user->nim }}
                    </span>
                    @if($user->prodi)
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            {{ $user->prodi }}
                        </span>
                    @endif
                    @if($user->angkatan)
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Angkatan {{ $user->angkatan }}
                        </span>
                    @endif
                </div>
                @if($user->bio)
                    <p class="text-gray-700 dark:text-gray-300 mb-4">{{ $user->bio }}</p>
                @endif

                <!-- Stats -->
                <div class="flex flex-wrap justify-center md:justify-start gap-6 mt-4">
                    <div class="text-center">
                        <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $stats['published_posts'] }}</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">Artikel Published</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ number_format($stats['total_views']) }}</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">Total Views</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ number_format($stats['total_likes']) }}</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">Total Likes</p>
                    </div>
                </div>
            </div>

            <!-- Edit Button (if own profile) -->
            @auth
                @if(auth()->id() === $user->id)
                    <div>
                        <a href="{{ route('profile.edit') }}" class="btn-primary">
                            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit Profile
                        </a>
                    </div>
                @endif
            @endauth
        </div>
    </x-glass-card>

    <!-- Articles Section -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 animate-slide-up delay-100">
            Artikel dari {{ $user->name }}
        </h2>

        @if($posts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach($posts as $index => $post)
                    <a href="{{ route('posts.show', $post->slug) }}" class="glass glass-dark rounded-2xl overflow-hidden card-hover animate-scale-in" style="animation-delay: {{ $index * 50 }}ms;">
                        <!-- Thumbnail -->
                        <div class="h-48 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center relative overflow-hidden">
                            @if($post->thumbnail)
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-6xl">{{ $post->category->icon }}</span>
                            @endif
                            <div class="absolute top-4 right-4">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full backdrop-blur-sm" style="background-color: {{ $post->category->color }}; color: white;">
                                    {{ $post->category->name }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <div class="flex items-center gap-2 mb-3 text-xs text-gray-600 dark:text-gray-400">
                                <span>{{ $post->published_at->format('d M Y') }}</span>
                                <span>•</span>
                                <span>{{ $post->reading_time }} min baca</span>
                            </div>

                            <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2 line-clamp-2">
                                {{ $post->title }}
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4 line-clamp-2">
                                {{ $post->excerpt }}
                            </p>

                            <div class="flex items-center justify-between text-sm text-gray-600 dark:text-gray-400">
                                <div class="flex items-center gap-3">
                                    <span class="flex items-center gap-1">
                                        ❤️ {{ $post->likes->count() }}
                                    </span>
                                    <span class="flex items-center gap-1">
                                        👁️ {{ $post->views }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center">
                {{ $posts->links() }}
            </div>
        @else
            <x-glass-card class="text-center py-16">
                <div class="w-20 h-20 bg-gray-200 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <p class="text-gray-600 dark:text-gray-400">{{ $user->name }} belum mempublikasikan artikel.</p>
            </x-glass-card>
        @endif
    </div>

</div>
@endsection