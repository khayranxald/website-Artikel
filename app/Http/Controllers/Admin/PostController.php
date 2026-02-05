<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with(['author', 'category']);

        // Filter by status
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('title', 'LIKE', "%{$search}%");
        }

        $posts = $query->latest()->paginate(20);

        return view('admin.posts.index', compact('posts'));
    }

    public function destroy(Post $post)
    {
        // Delete thumbnail
        if ($post->thumbnail) {
            Storage::disk('public')->delete($post->thumbnail);
        }

        $post->delete();

        return back()->with('success', 'Artikel berhasil dihapus.');
    }

    public function updateStatus(Post $post, Request $request)
    {
        $validated = $request->validate([
            'status' => 'required|in:draft,published,archived',
        ]);

        if ($validated['status'] === 'published' && $post->status !== 'published') {
            $validated['published_at'] = now();
        }

        $post->update($validated);

        return back()->with('success', 'Status artikel berhasil diperbarui.');
    }
}