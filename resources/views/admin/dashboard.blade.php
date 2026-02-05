@extends('layouts.app', ['title' => 'Admin Dashboard'])

@section('content')
<div class="max-w-7xl mx-auto page-transition">
    
    <!-- Header -->
    <div class="mb-8 animate-slide-down">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">Admin Dashboard</h1>
        <p class="text-gray-600 dark:text-gray-400">Kelola seluruh sistem NIMpress</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        
        <!-- Total Users -->
        <x-glass-card class="hover-lift animate-slide-up delay-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-1">Total Users</p>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white">{{ $stats['total_users'] }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">{{ $stats['total_mahasiswa'] }} mahasiswa</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
            </div>
        </x-glass-card>

        <!-- Total Posts -->
        <x-glass-card class="hover-lift animate-slide-up delay-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-1">Total Artikel</p>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white">{{ $stats['total_posts'] }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">{{ $stats['published_posts'] }} published</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
            </div>
        </x-glass-card>

        <!-- Pending Comments -->
        <x-glass-card class="hover-lift animate-slide-up delay-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-1">Komentar Pending</p>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white">{{ $stats['pending_comments'] }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">{{ $stats['total_comments'] }} total</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-xl flex items-center justify-center animate-pulse-slow">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
            </div>
        </x-glass-card>

        <!-- Total Engagement -->
        <x-glass-card class="hover-lift animate-slide-up delay-400">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 dark:text-gray-400 text-sm mb-1">Total Engagement</p>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white">{{ $stats['total_likes'] + $stats['total_views'] }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">❤️ {{ $stats['total_likes'] }} | 👁️ {{ $stats['total_views'] }}</p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-pink-600 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path>
                    </svg>
                </div>
            </div>
        </x-glass-card>

    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <a href="{{ route('admin.comments.index', ['status' => 'pending']) }}" class="glass glass-dark rounded-xl p-6 hover-lift flex items-center justify-between animate-scale-in">
            <div>
                <h3 class="font-bold text-gray-800 dark:text-white text-lg mb-1">Moderasi Komentar</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $stats['pending_comments'] }} menunggu</p>
            </div>
            <div class="w-10 h-10 bg-yellow-500 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>
        </a>

        <a href="{{ route('admin.posts.index') }}" class="glass glass-dark rounded-xl p-6 hover-lift flex items-center justify-between animate-scale-in delay-100">
            <div>
                <h3 class="font-bold text-gray-800 dark:text-white text-lg mb-1">Kelola Artikel</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $stats['total_posts'] }} artikel</p>
            </div>
            <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>
        </a>

        <a href="{{ route('admin.users.index') }}" class="glass glass-dark rounded-xl p-6 hover-lift flex items-center justify-between animate-scale-in delay-200">
            <div>
                <h3 class="font-bold text-gray-800 dark:text-white text-lg mb-1">Kelola Users</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $stats['total_users'] }} users</p>
            </div>
            <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>
        </a>
    </div>

    <!-- Pending Comments Table -->
    @if($pendingComments->count() > 0)
        <x-glass-card title="Komentar Menunggu Moderasi" class="mb-8 animate-slide-up">
            <div class="space-y-4">
                @foreach($pendingComments as $comment)
                    <div class="flex items-start gap-4 p-4 bg-yellow-50 dark:bg-yellow-900/10 border border-yellow-200 dark:border-yellow-800 rounded-lg">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                <span class="text-white font-semibold text-sm">{{ substr($comment->user->name, 0, 1) }}</span>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="font-semibold text-gray-800 dark:text-white">{{ $comment->user->name }}</span>
                                <span class="text-xs text-gray-500">pada</span>
                                <a href="{{ route('posts.show', $comment->post->slug) }}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm">
                                    {{ Str::limit($comment->post->title, 50) }}
                                </a>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300 text-sm">{{ $comment->content }}</p>
                        </div>
                        <div class="flex gap-2">
                            <form action="{{ route('admin.comments.approve', $comment) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-3 py-1 bg-green-500 text-white text-sm rounded hover:bg-green-600 transition">
                                    Approve
                                </button>
                            </form>
                            <form action="{{ route('admin.comments.reject', $comment) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600 transition">
                                    Reject
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-6 text-center">
                <a href="{{ route('admin.comments.index') }}" class="btn-primary">
                    Lihat Semua Komentar
                </a>
            </div>
        </x-glass-card>
    @endif

    <!-- Recent Posts & Top Authors -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        <!-- Recent Posts -->
        <x-glass-card title="Artikel Terbaru" class="animate-slide-up delay-100">
            <div class="space-y-3">
                @foreach($recentPosts as $post)
                    <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-800/50 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700/50 transition">
                        <div class="flex-1">
                            <a href="{{ route('posts.show', $post->slug) }}" class="font-semibold text-gray-800 dark:text-white hover:text-blue-600 dark:hover:text-blue-400">
                                {{ Str::limit($post->title, 40) }}
                            </a>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                {{ $post->author->name }} • {{ $post->created_at->diffForHumans() }}
                            </p>
                        </div>
                        <span class="px-2 py-1 text-xs rounded {{ $post->status === 'published' ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400' : 'bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400' }}">
                            {{ ucfirst($post->status) }}
                        </span>
                    </div>
                @endforeach
            </div>
        </x-glass-card>

        <!-- Top Authors -->
        <x-glass-card title="Top Authors" class="animate-slide-up delay-200">
            <div class="space-y-3">
                @foreach($topAuthors as $index => $author)
                    <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-gray-800/50 rounded-lg">
                        <span class="text-2xl font-bold text-gray-400">#{{ $index + 1 }}</span>
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                            <span class="text-white font-semibold">{{ substr($author->name, 0, 1) }}</span>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-800 dark:text-white">{{ $author->name }}</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">{{ $author->posts_count }} artikel</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-glass-card>

    </div>

</div>
@endsection