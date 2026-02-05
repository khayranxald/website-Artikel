<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'content',
        'status',
    ];

    // Relasi dengan Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scope: Approved comments
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    // Scope: Pending comments
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}