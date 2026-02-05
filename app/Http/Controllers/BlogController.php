<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::published()
            ->with(['category', 'author:id,nim,name,avatar,prodi', 'likes:post_id']) // Mengambil data relasi sejak awal dengan memilih kolom tertentu.
            ->withCount('likes') // Add likes count
            ->latest();
        
        // Filter by category
        if ($request->has('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }
        
        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                ->orWhere('content', 'LIKE', "%{$search}%");
            });
        }
        
        $posts = $query->paginate(12);
        $categories = Category::withCount('posts')->get();
        
        return view('blog.index', compact('posts', 'categories'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = Post::published()
            ->where('category_id', $category->id)
            ->with(['author', 'likes'])
            ->latest()
            ->paginate(12);
        
        $categories = Category::withCount('posts')->get();
        
        return view('blog.category', compact('category', 'posts', 'categories'));
    }
}