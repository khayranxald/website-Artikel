@extends('layouts.app', ['title' => $post->title])

@section('content')
<div class="max-w-4xl mx-auto page-transition">
    
    <!-- Back Button -->
    <div class="mb-6 animate-slide-down">
        <a href="{{ route('blog.index') }}" class="inline-flex items-center text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Artikel
        </a>
    </div>

    <!-- Main Article Card -->
    <x-glass-card class="mb-8 animate-slide-up delay-100">
        
        <!-- Article Header -->
        <div class="mb-6">
            <!-- Category Badge -->
            <div class="mb-4">
                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold" style="background-color: {{ $post->category->color }}20; color: {{ $post->category->color }};">
                    {{ $post->category->icon }} {{ $post->category->name }}
                </span>
            </div>

            <!-- Title -->
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white mb-4">
                {{ $post->title }}
            </h1>

            <!-- Meta Information -->
            <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 dark:text-gray-400 mb-6">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                        @if($post->author->avatar)
                            <img src="{{ asset('storage/' . $post->author->avatar) }}" alt="{{ $post->author->name }}" class="w-full h-full object-cover rounded-full">
                        @else
                            <span class="text-white font-semibold">{{ substr($post->author->name, 0, 1) }}</span>
                        @endif
                    </div>
                    <div>
                        <a href="{{ route('profile.show', $post->author->nim) }}" class="font-semibold text-gray-800 dark:text-white hover:text-blue-600 dark:hover:text-blue-400">
                            {{ $post->author->name }}
                        </a>
                        <p class="text-xs">{{ $post->author->prodi ?? 'Mahasiswa' }}</p>
                    </div>
                </div>
                <span>•</span>
                <span>{{ $post->published_at->format('d M Y') }}</span>
                <span>•</span>
                <span>{{ $post->reading_time }} min baca</span>
                <span>•</span>
                <span>👁️ {{ $post->views }} views</span>
            </div>

            <!-- Thumbnail -->
            @if($post->thumbnail)
                <div class="rounded-xl overflow-hidden mb-6">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}" class="w-full h-auto object-cover">
                </div>
            @else
                <div class="h-64 rounded-xl bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center mb-6">
                    <span class="text-9xl">{{ $post->category->icon }}</span>
                </div>
            @endif
        </div>

        <!-- Article Content -->
        <div class="prose prose-lg dark:prose-invert max-w-none mb-8">
            {!! nl2br(e($post->content)) !!}
        </div>

        <hr class="my-8 border-gray-300 dark:border-gray-700">

        <!-- Article Footer Actions -->
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-4">
                <!-- Like Button -->
                @auth
                    <button 
                        type="button"
                        class="like-button flex items-center gap-2 px-4 py-2 rounded-lg {{ $post->isLikedBy(auth()->user()) ? 'bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400' : 'bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400' }} hover:scale-105 transition"
                        data-post-id="{{ $post->id }}"
                        data-url="{{ route('posts.like', $post) }}"
                    >
                        <svg class="w-5 h-5 heart-icon {{ $post->isLikedBy(auth()->user()) ? 'liked' : '' }}" fill="{{ $post->isLikedBy(auth()->user()) ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        <span class="like-count">{{ $post->likes->count() }}</span>
                    </button>
                @else
                    <a href="{{ route('login') }}" class="flex items-center gap-2 px-4 py-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 hover:scale-105 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        <span>{{ $post->likes->count() }}</span>
                    </a>
                @endauth

                <!-- Comment Count -->
                <a href="#comments" class="flex items-center gap-2 px-4 py-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 hover:scale-105 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <span>{{ $post->approvedComments->count() }}</span>
                </a>
            </div>

            <!-- Share & Download -->
            <div class="flex items-center gap-2">
                <button onclick="shareArticle()" class="px-4 py-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 hover:scale-105 transition" title="Share">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                    </svg>
                </button>
                <a href="{{ route('posts.pdf.preview', $post) }}" class="px-4 py-2 rounded-lg bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 hover:scale-105 transition flex items-center gap-2" target="_blank" title="Preview PDF">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    <span class="hidden sm:inline">Preview</span>
                </a>
                <a href="{{ route('posts.pdf', $post) }}" class="px-4 py-2 rounded-lg bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 hover:scale-105 transition flex items-center gap-2" title="Download PDF">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span class="hidden sm:inline">PDF</span>
                </a>
            </div>
        </div>

        <!-- Edit Button for Author -->
        @auth
            @if(auth()->id() === $post->user_id || auth()->user()->isAdmin())
                <div class="mt-6 pt-6 border-t border-gray-300 dark:border-gray-700">
                    <a href="{{ route('posts.edit', $post) }}" class="btn-secondary">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Artikel
                    </a>
                </div>
            @endif
        @endauth

    </x-glass-card>

    <!-- Comments Section -->
    <div id="comments" class="animate-slide-up delay-200">
        <x-glass-card title="Komentar ({{ $post->approvedComments->count() }})">
            
            <!-- Comment Form -->
            @auth
                <form action="{{ route('comments.store', $post) }}" method="POST" class="mb-8">
                    @csrf
                    <textarea 
                        name="content" 
                        rows="4" 
                        required
                        placeholder="Tulis komentar Anda..."
                        class="w-full px-4 py-3 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white placeholder-gray-400 mb-4"
                    ></textarea>
                    @error('content')
                        <p class="text-red-500 text-sm mb-4">{{ $message }}</p>
                    @enderror
                    <button type="submit" class="btn-primary">
                        Kirim Komentar
                    </button>
                </form>
            @else
                <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6 mb-8 text-center">
                    <p class="text-gray-700 dark:text-gray-300 mb-4">Silakan login untuk memberikan komentar</p>
                    <a href="{{ route('login') }}" class="btn-primary">Login</a>
                </div>
            @endauth

            <!-- Comments List -->
            @if($post->approvedComments->count() > 0)
                <div class="space-y-4">
                    @foreach($post->approvedComments as $comment)
                        <div class="flex gap-4 p-4 bg-gray-50 dark:bg-gray-800/50 rounded-lg hover-lift">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                    <span class="text-white font-semibold text-sm">{{ substr($comment->user->name, 0, 1) }}</span>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <div class="flex items-center gap-2">
                                        <span class="font-semibold text-gray-800 dark:text-white">{{ $comment->user->name }}</span>
                                        <span class="text-xs text-gray-500 dark:text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    @auth
                                        @if(auth()->id() === $comment->user_id || auth()->user()->isAdmin())
                                            <form action="{{ route('comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus komentar ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-700 dark:hover:text-red-300 text-xs">
                                                    Hapus
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                                <p class="text-gray-700 dark:text-gray-300">{{ $comment->content }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8 text-gray-600 dark:text-gray-400">
                    <p>Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                </div>
            @endif

        </x-glass-card>
    </div>

    <!-- Related Posts -->
    @if($relatedPosts->count() > 0)
        <div class="mt-12 animate-slide-up delay-300">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Artikel Terkait</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedPosts as $related)
                    <a href="{{ route('posts.show', $related->slug) }}" class="glass glass-dark rounded-xl overflow-hidden card-hover">
                        <div class="h-32 bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center">
                            @if($related->thumbnail)
                                <img src="{{ asset('storage/' . $related->thumbnail) }}" alt="{{ $related->title }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-4xl">{{ $related->category->icon }}</span>
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-800 dark:text-white mb-2 line-clamp-2">{{ $related->title }}</h3>
                            <p class="text-xs text-gray-600 dark:text-gray-400">{{ $related->reading_time }} min baca</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

</div>

@push('scripts')
<script>
function shareArticle() {
    if (navigator.share) {
        navigator.share({
            title: '{{ $post->title }}',
            text: '{{ $post->excerpt }}',
            url: window.location.href
        });
    } else {
        // Fallback: Copy to clipboard
        navigator.clipboard.writeText(window.location.href);
        alert('Link artikel telah disalin!');
    }
}
</script>
@endpush
@endsection