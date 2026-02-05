<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'thumbnail',
        'status',
        'views',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Auto-generate slug
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    // Relasi dengan User (Author)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Alias untuk author
    public function author()
    {
        return $this->user();
    }

    // Relasi dengan Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi dengan Comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Approved comments only
    public function approvedComments()
    {
        return $this->comments()->where('status', 'approved');
    }

    // Relasi dengan Likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Check if user liked this post
    public function isLikedBy($user)
    {
        if (!$user) return false;
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    // Scope: Published posts only
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
                    ->whereNotNull('published_at')
                    ->where('published_at', '<=', now());
    }

    // Scope: Latest posts
    public function scopeLatest($query)
    {
        return $query->orderBy('published_at', 'desc');
    }

    // Get reading time estimate
    public function getReadingTimeAttribute()
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $minutes = ceil($wordCount / 200); // Average reading speed
        return $minutes;
    }

    // Increment views
    public function incrementViews()
    {
        $this->increment('views');
    }
}