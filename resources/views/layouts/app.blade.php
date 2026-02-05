<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
        <meta name="user-authenticated" content="true">
    @endauth
    <title>{{ $title ?? 'NIMpress' }} - Platform Publikasi Mahasiswa</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 min-h-screen transition-colors duration-300">
    
    <!-- Navbar Component -->
    @include('components.navbar')
    
    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>
    
    <!-- Footer Component -->
    @include('components.footer')

    <!-- Flash Messages for Toast -->
    <x-flash-messages />
    
    @stack('scripts')
</body>
</html>