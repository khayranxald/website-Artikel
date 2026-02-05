<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak | NIMpress</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen flex items-center justify-center">
    
    <div class="max-w-2xl mx-auto px-4 text-center">
        <div class="glass glass-dark rounded-2xl p-12 animate-scale-in">
            <!-- 403 Animation -->
            <div class="text-9xl font-bold mb-4">
                <span class="bg-gradient-to-r from-red-600 to-orange-600 bg-clip-text text-transparent animate-pulse">403</span>
            </div>
            
            <!-- Icon -->
            <div class="w-24 h-24 mx-auto mb-6 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center">
                <svg class="w-12 h-12 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            
            <!-- Message -->
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                Akses Ditolak
            </h1>
            <p class="text-gray-600 dark:text-gray-400 mb-8">
                Maaf, Anda tidak memiliki izin untuk mengakses halaman ini.
            </p>
            
            <!-- Actions -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/" class="btn-primary">
                    Kembali ke Beranda
                </a>
                @auth
                    <a href="/dashboard" class="btn-secondary">
                        Dashboard Saya
                    </a>
                @else
                    <a href="/login" class="btn-secondary">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </div>

</body>
</html>