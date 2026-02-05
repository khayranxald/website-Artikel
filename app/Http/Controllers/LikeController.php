<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function toggle(Post $post)
    {
        $user = auth()->user();
        
        // Check if user already liked
        $like = $post->likes()->where('user_id', $user->id)->first();
        
        if ($like) {
            // Unlike
            $like->delete();
            $liked = false;
            $message = 'Like dihapus';
        } else {
            // Like
            $post->likes()->create([
                'user_id' => $user->id,
            ]);
            $liked = true;
            $message = 'Artikel disukai';
        }
        
        $likesCount = $post->likes()->count();
        
        // Return JSON for AJAX requests
        if (request()->expectsJson()) {
            return response()->json([
                'success' => true,
                'liked' => $liked,
                'likes_count' => $likesCount,
                'message' => $message,
            ]);
        }
        
        return back()->with('success', $message);
    }
}