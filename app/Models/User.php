<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nim',
        'name',
        'email',
        'prodi',
        'angkatan',
        'password',
        'role',
        'theme',
        'avatar',
        'bio',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // Accessor untuk cek apakah user adalah admin
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Accessor untuk cek apakah user adalah mahasiswa
    public function isMahasiswa(): bool
    {
        return $this->role === 'mahasiswa';
    }

    // Override method untuk login menggunakan NIM
    // public function getAuthIdentifierName()
    // {
    //     return 'nim';
    // }

    // Relasi dengan Posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Relasi dengan Comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Relasi dengan Likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Get total likes received on all posts
    public function totalLikesReceived()
    {
        return Like::whereIn('post_id', $this->posts->pluck('id'))->count();
    }

    // Get total views on all posts
    public function totalViewsReceived()
    {
        return $this->posts->sum('views');
    }
}