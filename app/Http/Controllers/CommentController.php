<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ], [
            'content.required' => 'Komentar tidak boleh kosong.',
            'content.max' => 'Komentar maksimal 1000 karakter.',
        ]);

        try {
            $post->comments()->create([
                'user_id' => auth()->id(),
                'content' => $validated['content'],
                'status' => 'pending', // Perlu moderasi admin
            ]);

            return back()->with('success', 'Komentar berhasil dikirim dan menunggu persetujuan admin.');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengirim komentar: ' . $e->getMessage());
        }
    }

    public function destroy(Comment $comment)
    {
        // Only comment author or admin can delete
        if (auth()->id() !== $comment->user_id && !auth()->user()->isAdmin()) {
            abort(403);
        }

        $comment->delete();

        return back()->with('success', 'Komentar berhasil dihapus.');
    }
}