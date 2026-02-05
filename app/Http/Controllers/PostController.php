<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
     use AuthorizesRequests;

    /**
     * Display a listing of user's posts
     */
    public function index()
    {
        $posts = auth()->user()->posts()
            ->with('category')
            ->latest()
            ->paginate(10);
            
        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.posts.create', compact('categories'));
    }

    /**
     * Store a newly created post
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        
        // Generate unique slug
        $slug = Str::slug($validated['title']);
        $count = Post::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug = "{$slug}-" . ($count + 1);
        }
        
        // Handle thumbnail upload
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }
        
        // Create post
        $post = auth()->user()->posts()->create([
            'title' => $validated['title'],
            'slug' => $slug,
            'category_id' => $validated['category_id'],
            'excerpt' => $validated['excerpt'],
            'content' => $validated['content'],
            'thumbnail' => $thumbnailPath,
            'status' => $validated['status'],
            'published_at' => $validated['status'] === 'published' ? now() : null,
        ]);

        return redirect()->route('posts.show', $post->slug)
            ->with('success', 'Artikel berhasil dibuat!');
    }

    /**
     * Display the specified post (public view)
     */
    public function show($slug)
    {
        $post = Post::with(['category', 'author', 'comments.user', 'likes'])
            ->where('slug', $slug)
            ->firstOrFail();
        
        // Only show published posts to non-owners
        if ($post->status !== 'published' && (!auth()->check() || auth()->id() !== $post->user_id)) {
            abort(404);
        }
        
        // Increment views (once per session)
        if (!session()->has('viewed_post_' . $post->id)) {
            $post->incrementViews();
            session()->put('viewed_post_' . $post->id, true);
        }
        
        // Get related posts
        $relatedPosts = Post::published()
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();
        
        return view('blog.show', compact('post', 'relatedPosts'));
    }

    /**
     * Show the form for editing the specified post
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $categories = Category::all();
        return view('dashboard.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified post
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $validated = $request->validated();
        
        // Update slug if title changed
        if ($post->title !== $validated['title']) {
            $slug = Str::slug($validated['title']);
            $count = Post::where('slug', 'LIKE', "{$slug}%")
                ->where('id', '!=', $post->id)
                ->count();
            if ($count > 0) {
                $slug = "{$slug}-" . ($count + 1);
            }
            $validated['slug'] = $slug;
        }
        
        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }
        
        // Update published_at if status changed to published
        if ($validated['status'] === 'published' && $post->status !== 'published') {
            $validated['published_at'] = now();
        }
        
        $post->update($validated);

        return redirect()->route('posts.show', $post->slug)
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * Remove the specified post
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        
        // Delete thumbnail
        if ($post->thumbnail) {
            Storage::disk('public')->delete($post->thumbnail);
        }
        
        $post->delete();

        return redirect()->route('dashboard.posts.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }
}