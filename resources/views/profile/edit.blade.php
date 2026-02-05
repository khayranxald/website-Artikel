@extends('layouts.app', ['title' => 'Edit Profile'])

@section('content')
<div class="max-w-4xl mx-auto page-transition">
    
    <!-- Header -->
    <div class="mb-8 animate-slide-down">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">Edit Profile</h1>
        <p class="text-gray-600 dark:text-gray-400">Perbarui informasi profil Anda</p>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 dark:bg-green-900/30 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-400 px-6 py-4 rounded-lg mb-6 animate-slide-down">
            {{ session('success') }}
        </div>
    @endif

    <!-- Profile Form -->
    <x-glass-card class="mb-6 animate-slide-up delay-100">
        <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-6">Informasi Profil</h2>
        
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- Avatar -->
            <div class="mb-6 text-center">
                <div class="w-32 h-32 mx-auto bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center mb-4 relative overflow-hidden">
                    @if(auth()->user()->avatar)
                        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Avatar" class="w-full h-full object-cover">
                    @else
                        <span class="text-white font-bold text-4xl">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    @endif
                </div>
                <label for="avatar" class="btn-secondary cursor-pointer inline-block">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Upload Avatar
                </label>
                <input type="file" id="avatar" name="avatar" accept="image/*" class="hidden" onchange="previewAvatar(event)">
                <p class="text-xs text-gray-500 dark:text-gray-500 mt-2">JPG, PNG (Max 1MB)</p>
                @error('avatar')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- NIM (readonly) -->
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">NIM</label>
                <input 
                    type="text" 
                    value="{{ auth()->user()->nim }}"
                    disabled
                    class="w-full px-4 py-3 rounded-lg bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-500 dark:text-gray-500"
                >
                <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">NIM tidak dapat diubah</p>
            </div>

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name', auth()->user()->name) }}"
                    required
                    class="w-full px-4 py-3 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white"
                >
                @error('name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email', auth()->user()->email) }}"
                    class="w-full px-4 py-3 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white"
                >
                @error('email')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Prodi -->
            <div class="mb-4">
                <label for="prodi" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Program Studi</label>
                <input 
                    type="text" 
                    id="prodi" 
                    name="prodi" 
                    value="{{ old('prodi', auth()->user()->prodi) }}"
                    class="w-full px-4 py-3 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white"
                >
                @error('prodi')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Angkatan -->
            <div class="mb-4">
                <label for="angkatan" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Angkatan</label>
                <input 
                    type="text" 
                    id="angkatan" 
                    name="angkatan" 
                    value="{{ old('angkatan', auth()->user()->angkatan) }}"
                    maxlength="4"
                    class="w-full px-4 py-3 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white"
                >
                @error('angkatan')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bio -->
            <div class="mb-6">
                <label for="bio" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Bio</label>
                <textarea 
                    id="bio" 
                    name="bio" 
                    rows="4"
                    maxlength="500"
                    placeholder="Ceritakan tentang diri Anda..."
                    class="w-full px-4 py-3 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white"
                >{{ old('bio', auth()->user()->bio) }}</textarea>
                <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">Maksimal 500 karakter</p>
                @error('bio')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-primary w-full">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Simpan Perubahan
            </button>
        </form>
    </x-glass-card>

    <!-- Change Password -->
    <x-glass-card class="animate-slide-up delay-200">
        <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-6">Ubah Password</h2>
        
        <form action="{{ route('profile.password') }}" method="POST">
            @csrf
            @method('PATCH')

            <!-- Current Password -->
            <div class="mb-4">
                <label for="current_password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    Password Saat Ini <span class="text-red-500">*</span>
                </label>
                <input 
                    type="password" 
                    id="current_password" 
                    name="current_password" 
                    required
                    class="w-full px-4 py-3 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white"
                >
                @error('current_password')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- New Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    Password Baru <span class="text-red-500">*</span>
                </label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required
                    class="w-full px-4 py-3 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white"
                >
                @error('password')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    Konfirmasi Password Baru <span class="text-red-500">*</span>
                </label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    required
                    class="w-full px-4 py-3 rounded-lg bg-white/50 dark:bg-gray-800/50 border border-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-400 focus:ring-2 focus:ring-blue-500/20 outline-none transition text-gray-800 dark:text-white"
                >
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-primary w-full">
                <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                </svg>
                Ubah Password
            </button>
        </form>
    </x-glass-card>

</div>

@push('scripts')
<script>
function previewAvatar(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const avatar = document.querySelector('.w-32.h-32');
        avatar.innerHTML = `<img src="${reader.result}" alt="Avatar Preview" class="w-full h-full object-cover">`;
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endpush
@endsection