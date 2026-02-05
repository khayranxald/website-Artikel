<footer class="glass glass-dark mt-20 border-t border-white/20">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Brand -->
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-xl">N</span>
                    </div>
                    <span class="text-xl font-bold text-gray-800 dark:text-white">NIMpress</span>
                </div>
                <p class="text-gray-600 dark:text-gray-400 text-sm">
                    Platform publikasi artikel mahasiswa berbasis web untuk berbagi pengetahuan dan karya ilmiah.
                </p>
            </div>
            
            <!-- Links -->
            <div>
                <h3 class="font-semibold text-gray-800 dark:text-white mb-4">Menu</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="/" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400">Beranda</a></li>
                    <li><a href="/artikel" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400">Artikel</a></li>
                    <li><a href="/tentang" class="text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400">Tentang</a></li>
                </ul>
            </div>
            
            <!-- Contact -->
            <div>
                <h3 class="font-semibold text-gray-800 dark:text-white mb-4">Kontak</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">
                    Email: info@nimpress.id<br>
                    Support: support@nimpress.id
                </p>
            </div>
        </div>
        
        <div class="border-t border-gray-300 dark:border-gray-700 mt-8 pt-6 text-center">
            <p class="text-gray-600 dark:text-gray-400 text-sm">
                © {{ date('Y') }} NIMpress. All rights reserved.
            </p>
        </div>
    </div>
</footer>