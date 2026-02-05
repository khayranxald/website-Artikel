<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_mahasiswa' => User::where('role', 'mahasiswa')->count(),
            'total_posts' => Post::count(),
            'published_posts' => Post::where('status', 'published')->count(),
            'draft_posts' => Post::where('status', 'draft')->count(),
            'total_comments' => Comment::count(),
            'pending_comments' => Comment::where('status', 'pending')->count(),
            'approved_comments' => Comment::where('status', 'approved')->count(),
            'rejected_comments' => Comment::where('status', 'rejected')->count(),
            'total_likes' => Like::count(),
            'total_views' => Post::sum('views'),
        ];

        // Recent Posts
        $recentPosts = Post::with(['author', 'category'])
            ->latest()
            ->take(5)
            ->get();

        // Pending Comments
        $pendingComments = Comment::with(['user', 'post'])
            ->where('status', 'pending')
            ->latest()
            ->take(10)
            ->get();

        // Top Authors
        $topAuthors = User::withCount('posts')
            ->where('role', 'mahasiswa')
            ->orderBy('posts_count', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentPosts', 'pendingComments', 'topAuthors'));
    }
}