@extends('layouts.app', ['title' => 'Tentang'])

@section('content')
<div class="max-w-6xl mx-auto page-transition">

    <!-- Hero Section -->
    <div class="relative overflow-hidden rounded-3xl mb-20">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 via-purple-500/10 to-pink-500/10 blur-3xl"></div>
        <div class="relative glass glass-dark rounded-3xl p-12 text-center">
            <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl mb-8 animate-float">
                <span class="text-4xl">📚</span>
            </div>
            <h1 class="text-5xl md:text-6xl font-bold text-gray-800 dark:text-white mb-6">
                Tentang <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600">NIMpress</span>
            </h1>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto leading-relaxed">
                Platform publikasi mahasiswa Indonesia untuk berbagi ide, pengetahuan, 
                pengalaman, dan karya ilmiah secara modern, profesional, dan kolaboratif.
            </p>
        </div>
    </div>

    <!-- What is NIMpress -->
    <div class="grid lg:grid-cols-2 gap-12 mb-24">
        <!-- Left Column - Vision -->
        <div class="relative animate-slide-up">
            <div class="absolute -inset-4 bg-gradient-to-br from-blue-500/5 to-purple-500/5 rounded-2xl blur-xl"></div>
            <x-glass-card class="relative h-full">
                <div class="flex items-start gap-4 mb-6">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                            Apa itu NIMpress?
                        </h2>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-lg">
                            NIMpress adalah ekosistem digital revolusioner yang dirancang khusus untuk mahasiswa Indonesia 
                            dalam mengekspresikan pemikiran kritis, mempublikasikan karya ilmiah, dan membangun jejaring 
                            akademik melalui platform yang modern dan intuitif.
                        </p>
                    </div>
                </div>
                <div class="mt-8 p-6 bg-gradient-to-r from-blue-50 to-purple-50 dark:from-blue-900/20 dark:to-purple-900/20 rounded-xl border border-blue-100 dark:border-blue-800/30">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 dark:text-white">Visi Kami</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">
                        Menjadi platform utama dalam mengakselerasi budaya literasi digital dan kolaborasi akademik 
                        antar mahasiswa se-Indonesia.
                    </p>
                </div>
            </x-glass-card>
        </div>

        <!-- Right Column - Mission -->
        <div class="relative animate-slide-up delay-100">
            <div class="absolute -inset-4 bg-gradient-to-br from-purple-500/5 to-pink-500/5 rounded-2xl blur-xl"></div>
            <x-glass-card class="relative h-full">
                <div class="flex items-start gap-4 mb-6">
                    <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                            Tujuan & Misi
                        </h2>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 dark:text-white">Meningkatkan Budaya Literasi</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Mendorong mahasiswa untuk aktif menulis dan membaca karya ilmiah.</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 dark:text-white">Wadah Publikasi Karya</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Platform profesional untuk mempublikasikan artikel ilmiah dan opini.</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 dark:text-white">Kolaborasi Akademik</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Memfasilitasi diskusi dan kerja sama antar mahasiswa dari berbagai kampus.</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-pink-500 to-rose-600 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 dark:text-white">Pengembangan Profesional</h4>
                                    <p class="text-gray-600 dark:text-gray-300 text-sm">Mempersiapkan mahasiswa menghadapi dunia kerja melalui portofolio digital.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </x-glass-card>
        </div>
    </div>

    <!-- Features Section -->
    <div class="mb-24">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 dark:text-white mb-4">
                Fitur <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600">Unggulan</span>
            </h2>
            <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto text-lg">
                Nikmati pengalaman menulis dan berkolaborasi dengan fitur-fitur terbaik yang kami sediakan.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="group relative animate-scale-in">
                <div class="absolute -inset-0.5 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl blur opacity-0 group-hover:opacity-30 transition duration-500"></div>
                <x-glass-card class="relative h-full text-center p-8 hover-lift">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <span class="text-3xl">✍️</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Editor Modern</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Tulis artikel dengan editor WYSIWYG yang powerful, mendukung format teks, gambar, dan kode.
                    </p>
                    <div class="inline-flex items-center gap-2 text-sm font-medium text-blue-600 dark:text-blue-400">
                        <span>Selengkapnya</span>
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </div>
                </x-glass-card>
            </div>

            <!-- Feature 2 -->
            <div class="group relative animate-scale-in delay-100">
                <div class="absolute -inset-0.5 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl blur opacity-0 group-hover:opacity-30 transition duration-500"></div>
                <x-glass-card class="relative h-full text-center p-8 hover-lift">
                    <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <span class="text-3xl">💬</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Kolaborasi Interaktif</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Diskusikan artikel dengan pembaca, dapatkan feedback, dan bangun jaringan akademik.
                    </p>
                    <div class="inline-flex items-center gap-2 text-sm font-medium text-emerald-600 dark:text-emerald-400">
                        <span>Selengkapnya</span>
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </div>
                </x-glass-card>
            </div>

            <!-- Feature 3 -->
            <div class="group relative animate-scale-in delay-200">
                <div class="absolute -inset-0.5 bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl blur opacity-0 group-hover:opacity-30 transition duration-500"></div>
                <x-glass-card class="relative h-full text-center p-8 hover-lift">
                    <div class="w-20 h-20 bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <span class="text-3xl">📄</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Export Profesional</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Unduh artikel dalam format PDF yang elegan untuk keperluan akademik dan profesional.
                    </p>
                    <div class="inline-flex items-center gap-2 text-sm font-medium text-amber-600 dark:text-amber-400">
                        <span>Selengkapnya</span>
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </div>
                </x-glass-card>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="mb-24 animate-slide-up">
        <x-glass-card class="p-12">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">NIMpress dalam Angka</h2>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Bukti nyata kontribusi kami dalam mengembangkan literasi mahasiswa Indonesia.
                </p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600 mb-2">proses</div>
                    <p class="text-gray-600 dark:text-gray-300 font-medium">Mahasiswa Aktif</p>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-emerald-600 to-teal-600 mb-2">-</div>
                    <p class="text-gray-600 dark:text-gray-300 font-medium">Artikel Terbit</p>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-amber-600 to-orange-600 mb-2">-</div>
                    <p class="text-gray-600 dark:text-gray-300 font-medium">Total Views</p>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-rose-600 to-pink-600 mb-2">-</div>
                    <p class="text-gray-600 dark:text-gray-300 font-medium">Kampus Partner</p>
                </div>
            </div>
        </x-glass-card>
    </div>

    <!-- CTA Section -->
    <div class="text-center animate-slide-up">
        <div class="relative overflow-hidden rounded-3xl">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/20 via-purple-500/20 to-pink-500/20 blur-3xl"></div>
            <x-glass-card class="relative p-16">
                <div class="max-w-3xl mx-auto">
                    <h2 class="text-4xl font-bold text-gray-800 dark:text-white mb-6">
                        Siap Membuat <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600">Perbedaan</span>?
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300 mb-10">
                        Bergabunglah dengan ribuan mahasiswa lainnya yang telah memulai perjalanan menulis mereka di NIMpress.
                        Bagikan pengetahuan Anda, bangun jaringan, dan berkembang bersama.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        @auth
                            <a href="{{ route('dashboard') }}" 
                               class="group relative px-10 py-5 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-bold rounded-2xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
                                <span class="relative flex items-center gap-3">
                                    <svg class="w-6 h-6 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Lanjutkan Menulis
                                </span>
                            </a>
                        @else
                            <a href="{{ route('register') }}" 
                               class="group relative px-10 py-5 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-bold rounded-2xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                                <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></div>
                                <span class="relative flex items-center gap-3">
                                    <svg class="w-6 h-6 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                    </svg>
                                    Daftar Sekarang
                                </span>
                            </a>
                            <a href="{{ route('login') }}" 
                               class="px-10 py-5 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900 text-gray-800 dark:text-gray-200 font-bold rounded-2xl border border-gray-300 dark:border-gray-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                                Masuk ke Akun
                            </a>
                        @endauth
                    </div>
                    
                    <p class="text-gray-500 dark:text-gray-400 mt-8 text-sm">
                        Gratis selamanya untuk mahasiswa Indonesia
                    </p>
                </div>
            </x-glass-card>
        </div>
    </div>

</div>

<!-- Custom CSS -->
<style>
.glass-dark {
    background: rgba(15, 23, 42, 0.6);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.hover-lift {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.hover-lift:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.animate-float {
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-15px);
    }
}

.animate-scale-in {
    animation: scaleIn 0.6s ease-out;
}

@keyframes scaleIn {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
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

.animate-slide-down {
    animation: slideDown 0.6s ease-out;
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

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.delay-100 { animation-delay: 0.1s; }
.delay-200 { animation-delay: 0.2s; }
</style>
@endsection