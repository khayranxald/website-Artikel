<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11pt;
            line-height: 1.6;
            color: #333;
            padding: 20px;
        }

        .header {
            border-bottom: 3px solid #3B82F6;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .logo {
            font-size: 24pt;
            font-weight: bold;
            color: #3B82F6;
            margin-bottom: 5px;
        }

        .tagline {
            font-size: 9pt;
            color: #666;
        }

        .article-meta {
            background-color: #F3F4F6;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .article-meta table {
            width: 100%;
            border-collapse: collapse;
        }

        .article-meta td {
            padding: 5px 0;
            font-size: 10pt;
        }

        .article-meta td:first-child {
            font-weight: bold;
            width: 120px;
            color: #555;
        }

        .category-badge {
            display: inline-block;
            background-color: #3B82F6;
            color: white;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 9pt;
            font-weight: bold;
        }

        .article-title {
            font-size: 20pt;
            font-weight: bold;
            color: #1F2937;
            margin-bottom: 10px;
            line-height: 1.3;
        }

        .article-excerpt {
            font-size: 11pt;
            color: #666;
            font-style: italic;
            margin-bottom: 20px;
            padding-left: 15px;
            border-left: 4px solid #3B82F6;
        }

        .article-content {
            text-align: justify;
            margin-bottom: 30px;
        }

        .article-content p {
            margin-bottom: 12px;
        }

        .footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 2px solid #E5E7EB;
            font-size: 9pt;
            color: #666;
        }

        .footer-stats {
            margin-bottom: 10px;
        }

        .footer-stats span {
            margin-right: 15px;
        }

        .qr-section {
            margin-top: 20px;
            text-align: center;
            padding: 15px;
            background-color: #F9FAFB;
            border-radius: 8px;
        }

        .qr-section p {
            font-size: 9pt;
            color: #666;
            margin-bottom: 5px;
        }

        .url-text {
            font-size: 9pt;
            color: #3B82F6;
            word-break: break-all;
        }

        .watermark {
            position: fixed;
            bottom: 20px;
            right: 20px;
            font-size: 8pt;
            color: #CCC;
        }

        .page-break {
            page-break-after: always;
        }

        h1, h2, h3, h4, h5, h6 {
            color: #1F2937;
            margin-top: 15px;
            margin-bottom: 10px;
        }

        ul, ol {
            margin-left: 20px;
            margin-bottom: 12px;
        }

        li {
            margin-bottom: 5px;
        }

        blockquote {
            border-left: 4px solid #3B82F6;
            padding-left: 15px;
            margin: 15px 0;
            font-style: italic;
            color: #555;
        }

        code {
            background-color: #F3F4F6;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
            font-size: 10pt;
        }

        pre {
            background-color: #F3F4F6;
            padding: 12px;
            border-radius: 6px;
            overflow-x: auto;
            margin: 15px 0;
        }

        pre code {
            background-color: transparent;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }

        table th,
        table td {
            border: 1px solid #E5E7EB;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #F3F4F6;
            font-weight: bold;
        }

        img {
            max-width: 100%;
            height: auto;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="logo">NIMpress</div>
        <div class="tagline">Platform Publikasi Artikel Mahasiswa</div>
    </div>

    <!-- Article Meta -->
    <div class="article-meta">
        <table>
            <tr>
                <td>Penulis</td>
                <td>{{ $post->author->name }} ({{ $post->author->nim }})</td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>{{ $post->author->prodi ?? '-' }}</td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td><span class="category-badge">{{ $post->category->name }}</span></td>
            </tr>
            <tr>
                <td>Tanggal Publikasi</td>
                <td>{{ $post->published_at ? $post->published_at->format('d F Y') : '-' }}</td>
            </tr>
            <tr>
                <td>Waktu Baca</td>
                <td>{{ $post->reading_time }} menit</td>
            </tr>
        </table>
    </div>

    <!-- Article Title -->
    <h1 class="article-title">{{ $post->title }}</h1>

    <!-- Article Excerpt -->
    @if($post->excerpt)
        <div class="article-excerpt">
            {{ $post->excerpt }}
        </div>
    @endif

    <!-- Article Content -->
    <div class="article-content">
        {!! nl2br(e($post->content)) !!}
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-stats">
            <strong>Statistik Artikel:</strong><br>
            <span>👁️ {{ $post->views }} views</span>
            <span>❤️ {{ $post->likes->count() }} likes</span>
            <span>💬 {{ $post->comments->count() }} comments</span>
        </div>

        <div class="qr-section">
            <p><strong>Baca artikel lengkap online:</strong></p>
            <p class="url-text">{{ route('posts.show', $post->slug) }}</p>
        </div>

        <div style="text-align: center; margin-top: 20px; font-size: 9pt; color: #999;">
            <p>Dokumen ini di-generate otomatis dari NIMpress</p>
            <p>© {{ date('Y') }} NIMpress - Platform Publikasi Mahasiswa</p>
            <p>Dicetak pada: {{ now()->format('d F Y H:i') }} WIB</p>
        </div>
    </div>

    <!-- Watermark -->
    <div class="watermark">NIMpress.id</div>
</body>
</html>