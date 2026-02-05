@extends('layouts.app', ['title' => 'Moderasi Komentar'])

@section('content')
<div class="max-w-7xl mx-auto page-transition">
    
    <!-- Header -->
    <div class="flex items-center justify-between mb-8 animate-slide-down">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">Moderasi Komentar</h1>
            <p class="text-gray-600 dark:text-gray-400">Kelola semua komentar dari pengguna</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn-secondary">
            <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 dark:bg-green-900/30 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-400 px-6 py-4 rounded-lg mb-6 animate-slide-down">
            {{ session('success') }}
        </div>
    @endif

    <!-- Filter -->
    <x-glass-card class="mb-6 animate-slide-up delay-100">
        <form action="{{ route('admin.comments.index') }}" method="GET" class="flex gap-4">
            <select name="status" class="flex-1 px-4 py-2 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 text-gray-800 dark:text-white">
                <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua Status</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
            <button type="submit" class="btn-primary">
                Filter
            </button>
        </form>
    </x-glass-card>

    <!-- Comments List -->
    @if($comments->count() > 0)
        <div class="space-y-4">
            @foreach($comments as $index => $comment)
                <x-glass-card class="hover-lift animate-slide-up" style="animation-delay: {{ $index * 50 }}ms;">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                <span class="text-white font-semibold">{{ substr($comment->user->name, 0, 1) }}</span>
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="font-semibold text-gray-800 dark:text-white">{{ $comment->user->name }}</span>
                                <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                <span class="px-2 py-1 text-xs rounded {{ $comment->status === 'approved' ? 'bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400' : ($comment->status === 'pending' ? 'bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400' : 'bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400') }}">
                                    {{ ucfirst($comment->status) }}
                                </span>
                            </div>
                            <a href="{{ route('posts.show', $comment->post->slug) }}" class="text-blue-600 dark:text-blue-400 hover:underline text-sm mb-2 block">
                                Pada artikel: {{ $comment->post->title }}
                            </a>
                            <p class="text-gray-700 dark:text-gray-300">{{ $comment->content }}</p>
                        </div>
                        <div class="flex flex-col gap-2">
                            @if($comment->status === 'pending')
                                <form action="{{ route('admin.comments.approve', $comment) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-4 py-2 bg-green-500 text-white text-sm rounded hover:bg-green-600 transition w-full">
                                        Approve
                                    </button>
                                </form>
                                <form action="{{ route('admin.comments.reject', $comment) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-4 py-2 bg-yellow-500 text-white text-sm rounded hover:bg-yellow-600 transition w-full">
                                        Reject
                                    </button>
                                </form>
                            @endif
                            <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white text-sm rounded hover:bg-red-600 transition w-full">
                                Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </x-glass-card>
            @endforeach
        </div>
            <!-- Pagination -->
                <div class="mt-8">
                    {{ $comments->links() }}
                </div>
            @else
                <x-glass-card class="text-center py-16">
                    <p class="text-gray-600 dark:text-gray-400">Tidak ada komentar yang perlu dimoderasi.</p>
                </x-glass-card>
            @endif
</div>
@endsection
