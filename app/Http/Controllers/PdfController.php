<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function download(Post $post)
    {
        // Only published posts or own posts
        if ($post->status !== 'published' && (!auth()->check() || auth()->id() !== $post->user_id)) {
            abort(404);
        }

        // Load post with relations
        $post->load(['author', 'category']);

        // Generate PDF
        $pdf = Pdf::loadView('pdf.article', compact('post'))
            ->setPaper('a4', 'portrait')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultFont' => 'DejaVu Sans',
            ]);

        // Download with filename
        $filename = str_replace(' ', '-', strtolower($post->title)) . '.pdf';
        
        return $pdf->download($filename);
    }

    public function stream(Post $post)
    {
        // Only published posts or own posts
        if ($post->status !== 'published' && (!auth()->check() || auth()->id() !== $post->user_id)) {
            abort(404);
        }

        // Load post with relations
        $post->load(['author', 'category']);

        // Generate PDF
        $pdf = Pdf::loadView('pdf.article', compact('post'))
            ->setPaper('a4', 'portrait')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'defaultFont' => 'DejaVu Sans',
            ]);

        // Stream in browser
        return $pdf->stream();
    }
}