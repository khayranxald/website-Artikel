@extends('layouts.app', ['title' => 'Kelola Users'])

@section('content')
<div class="max-w-7xl mx-auto page-transition">
    
    <!-- Header -->
    <div class="flex items-center justify-between mb-8 animate-slide-down">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">Kelola Users</h1>
            <p class="text-gray-600 dark:text-gray-400">Manajemen semua pengguna sistem</p>
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
        <form action="{{ route('admin.users.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="Cari nama, NIM, atau email..."
                class="px-4 py-2 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 text-gray-800 dark:text-white"
            >
            <select name="role" class="px-4 py-2 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 text-gray-800 dark:text-white">
                <option value="all" {{ request('role') == 'all' ? 'selected' : '' }}>Semua Role</option>
                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="mahasiswa" {{ request('role') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
            </select>
            <button type="submit" class="btn-primary">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                Cari
            </button>
        </form>
    </x-glass-card>

    <!-- Users List -->
    @if($users->count() > 0)
        <div class="space-y-4">
            @foreach($users as $index => $user)
                <x-glass-card class="hover-lift animate-slide-up" style="animation-delay: {{ $index * 50 }}ms;">
                    <div class="flex items-center gap-4">
                        <!-- Avatar -->
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-bold text-xl">{{ substr($user->name, 0, 1) }}</span>
                        </div>

                        <!-- User Info -->
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <h3 class="text-lg font-bold text-gray-800 dark:text-white">{{ $user->name }}</h3>
                                <span class="px-2 py-1 text-xs rounded {{ $user->role === 'admin' ? 'bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400' : 'bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </div>
                            <div class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                                <p>NIM: {{ $user->nim }}</p>
                                @if($user->email)
                                    <p>Email: {{ $user->email }}</p>
                                @endif
                                @if($user->prodi)
                                    <p>Prodi: {{ $user->prodi }} @if($user->angkatan) - Angkatan {{ $user->angkatan }} @endif</p>
                                @endif
                                <p>Bergabung: {{ $user->created_at->format('d M Y') }}</p>
                            </div>
                        </div>

                        <!-- Stats -->
                        <div class="text-center px-6">
                            <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $user->posts_count }}</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">Artikel</p>
                        </div>

                        <!-- Actions -->
                        <div class="flex flex-col gap-2">
                            <a href="{{ route('blog.index', ['author' => $user->id]) }}" class="px-4 py-2 text-sm bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 rounded hover:bg-blue-200 dark:hover:bg-blue-900/50 transition text-center">
                                Lihat Artikel
                            </a>
                            @if($user->id !== auth()->id())
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini? Semua artikel dan komentar juga akan terhapus.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full px-4 py-2 text-sm bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400 rounded hover:bg-red-200 dark:hover:bg-red-900/50 transition">
                                        Hapus User
                                    </button>
                                </form>
                            @else
                                <span class="px-4 py-2 text-sm bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-500 rounded text-center">
                                    (You)
                                </span>
                            @endif
                        </div>
                    </div>
                </x-glass-card>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $users->links() }}
        </div>
    @else
        <x-glass-card class="text-center py-16">
            <p class="text-gray-600 dark:text-gray-400">Tidak ada user yang ditemukan.</p>
        </x-glass-card>
    @endif

</div>
@endsection