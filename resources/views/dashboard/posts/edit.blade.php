@extends('layouts.app', ['title' => 'Edit Artikel'])

@section('content')
<div class="max-w-4xl mx-auto page-transition">
    
    <!-- Header -->
    <div class="mb-8 animate-slide-down">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">Edit Artikel</h1>
        <p class="text-gray-600 dark:text-gray-400">Perbarui konten artikel Anda</p>
    </div>

    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <x-glass-card class="mb-6 animate-slide-up delay-100">
            
            <!-- Title -->
            <div class="mb-6">
                <label for="title" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    Judul Artikel <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    value="{{ old('title', $post->title) }}"
                    required
                    placeholder="Masukkan judul artikel yang menarik..."
                    class="w-full px-4 py-3 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white placeholder-gray-400 text-lg font-semibold"
                >
                @error('title')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Category & Status -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="category_id" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        Kategori <span class="text-red-500">*</span>
                    </label>
                    <select 
                        id="category_id" 
                        name="category_id" 
                        required
                        class="w-full px-4 py-3 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white"
                    >
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->icon }} {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="status" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <select 
                        id="status" 
                        name="status" 
                        required
                        class="w-full px-4 py-3 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white"
                    >
                        <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>📝 Draft</option>
                        <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>✅ Publish</option>
                    </select>
                    @error('status')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Current Thumbnail -->
            @if($post->thumbnail)
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        Thumbnail Saat Ini
                    </label>
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Current thumbnail" class="w-full h-48 object-cover rounded-lg">
                </div>
            @endif

            <!-- Thumbnail Upload -->
            <div class="mb-6">
                <label for="thumbnail" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    {{ $post->thumbnail ? 'Ganti Thumbnail (Opsional)' : 'Upload Thumbnail (Opsional)' }}
                </label>
                <div class="flex items-center gap-4">
                    <label for="thumbnail" class="flex items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:border-blue-500 dark:hover:border-blue-400 transition">
                        <div class="text-center">
                            <svg class="w-10 h-10 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Klik untuk upload gambar baru</p>
                            <p class="text-xs text-gray-500 dark:text-gray-500">PNG, JPG, WEBP (Max 2MB)</p>
                        </div>
                        <input 
                            type="file" 
                            id="thumbnail" 
                            name="thumbnail" 
                            accept="image/*"
                            class="hidden"
                            onchange="previewImage(event)"
                        >
                    </label>
                </div>
                <div id="thumbnail-preview" class="mt-4 hidden">
                    <img src="" alt="Preview" class="w-full h-48 object-cover rounded-lg">
                </div>
                @error('thumbnail')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Excerpt -->
            <div class="mb-6">
                <label for="excerpt" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    Ringkasan (Opsional)
                </label>
                <textarea 
                    id="excerpt" 
                    name="excerpt" 
                    rows="3"
                    placeholder="Tulis ringkasan singkat artikel..."
                    class="w-full px-4 py-3 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white placeholder-gray-400"
                >{{ old('excerpt', $post->excerpt) }}</textarea>
                @error('excerpt')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Content -->
            <div class="mb-6">
                <label for="content" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    Konten Artikel <span class="text-red-500">*</span>
                </label>
                <textarea 
                    id="content" 
                    name="content" 
                    rows="20"
                    required
                    class="w-full px-4 py-3 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white placeholder-gray-400 font-mono text-sm"
                >{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

        </x-glass-card>

        <!-- Action Buttons -->
        <div class="flex items-center gap-4 animate-slide-up delay-200">
            <button type="submit" class="btn-primary flex-1">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Update Artikel
            </button>
            <a href="{{ route('dashboard.posts.index') }}" class="btn-secondary flex-1 text-center">
                Batal
            </a>
        </div>

    </form>

</div>

@push('scripts')
<script>
function previewImage(event) {
    const preview = document.getElementById('thumbnail-preview');
    const img = preview.querySelector('img');
    
    if (event.target.files && event.target.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            img.src = e.target.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(event.target.files[0]);
    }
}
</script>
@endpush
@endsection