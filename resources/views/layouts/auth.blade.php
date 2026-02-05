<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Auth' }} - NIMpress</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            position: relative;
            overflow-x: hidden;
        }
        
        /* Video Background */
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }
        
        .video-background video {
            min-width: 100%;
            min-height: 100%;
            object-fit: cover;
            filter: brightness(0.6);
        }
        
        /* Dark mode overlay untuk video */
        .dark .video-overlay {
            background: rgba(0, 0, 0, 0.7);
        }
        
        .video-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: -1;
        }
        
        /* Enhance glass effect untuk kontras dengan video background */
        .glass-enhanced {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .dark .glass-enhanced {
            background: rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="min-h-screen transition-colors duration-300">
    
    <!-- Video Background -->
    <div class="video-background">
        <video autoplay muted loop playsinline>
            <!-- Anda bisa mengganti source video dengan file yang diinginkan -->
            <source src="{{ asset('videos/neon.mp4') }}" type="video/mp4">
            <!-- Fallback image jika video tidak bisa diputar -->
            <img src="https://images.unsplash.com/photo-1557683316-973673baf926?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Background fallback">
        </video>
    </div>
    
    <!-- Overlay untuk memberikan efek gelap/terang pada video -->
    <div class="video-overlay"></div>
    
    <!-- Dark Mode Toggle (Fixed Position) -->
    <div class="fixed top-6 right-6 z-50">
        <button onclick="toggleDarkMode()" class="glass-enhanced p-3 rounded-full hover:shadow-xl transition-all duration-300 shadow-lg">
            <svg class="w-5 h-5 text-gray-700 dark:text-gray-300 dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
            </svg>
            <svg class="w-5 h-5 text-gray-300 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
        </button>
    </div>

    <!-- Main Content -->
    <main class="flex items-center justify-center min-h-screen px-4 py-8">
        <div class="w-full max-w-md">
            
            <!-- Logo & Brand -->
            <div class="text-center mb-8">
                <a href="/" class="inline-flex items-center space-x-2 mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                        <span class="text-white font-bold text-2xl">N</span>
                    </div>
                    <span class="text-2xl font-bold text-white drop-shadow-lg">NIMpress</span>
                </a>
                <p class="text-white drop-shadow">Platform Publikasi Mahasiswa</p>
            </div>
            
            <!-- Auth Card -->
            <div class="glass-enhanced rounded-2xl p-8 shadow-2xl">
                @yield('content')
            </div>
            
            <!-- Back to Home -->
            <div class="text-center mt-6">
                <a href="/" class="text-blue-500 hover:text-blue-700 transition text-sm drop-shadow hover:underline">
                    ← Kembali ke Beranda
                </a>
            </div>
        </div>
    </main>
    
    <script>
        // Dark mode toggle function
        function toggleDarkMode() {
            const html = document.documentElement;
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }
        
        // Check for saved theme preference
        if (localStorage.getItem('theme') === 'dark' || 
            (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
        
        // Pause/play video based on visibility (untuk menghemat resources)
        document.addEventListener('visibilitychange', function() {
            const video = document.querySelector('.video-background video');
            if (document.hidden) {
                video.pause();
            } else {
                video.play();
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>