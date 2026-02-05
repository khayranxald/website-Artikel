<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Server Error | NIMpress</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen flex items-center justify-center">
    
    <div class="max-w-2xl mx-auto px-4 text-center">
        <div class="glass glass-dark rounded-2xl p-12 animate-scale-in">
            <!-- 500 Animation -->
            <div class="text-9xl font-bold mb-4">
                <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent animate-pulse">500</span>
            </div>
            
            <!-- Icon -->
            <div class="w-24 h-24 mx-auto mb-6 bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center">
                <svg class="w-12 h-12 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </div>
            
            <!-- Message -->
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">
                Terjadi Kesalahan Server
            </h1>
            <p class="text-gray-600 dark:text-gray-400 mb-8">
                Maaf, terjadi kesalahan pada server. Tim kami sedang bekerja untuk memperbaikinya.
            </p>
            
            <!-- Actions -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button onclick="window.location.reload()" class="btn-primary">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Muat Ulang
                </button>
                <a href="/" class="btn-secondary">
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

</body>
</html>