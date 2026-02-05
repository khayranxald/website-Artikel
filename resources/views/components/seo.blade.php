@props([
    'title' => 'NIMpress - Platform Publikasi Artikel Mahasiswa',
    'description' => 'Platform publikasi artikel mahasiswa untuk berbagi pengetahuan, pengalaman, dan karya ilmiah dengan mudah.',
    'image' => asset('assets/images/og-image.jpg'),
    'url' => url()->current(),
])

<!-- Primary Meta Tags -->
<title>{{ $title }}</title>
<meta name="title" content="{{ $title }}">
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="artikel mahasiswa, publikasi, blog mahasiswa, karya ilmiah, NIMpress">
<meta name="author" content="NIMpress">
<meta name="robots" content="index, follow">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $url }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $image }}">
<meta property="og:site_name" content="NIMpress">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ $url }}">
<meta property="twitter:title" content="{{ $title }}">
<meta property="twitter:description" content="{{ $description }}">
<meta property="twitter:image" content="{{ $image }}">

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
<link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

<!-- Canonical URL -->
<link rel="canonical" href="{{ $url }}">