<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;

// Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Blog Routes (Public)
Route::get('/artikel', [BlogController::class, 'index'])->name('blog.index');
Route::get('/artikel/kategori/{slug}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/artikel/{slug}', [PostController::class, 'show'])->name('posts.show');


Route::get('/tentang', function () {
    return view('welcome');
})->name('tentang');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
    
    // Profile Management
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    // tentang
    Route::get('/tentang', function () {
    return view('tentang.index');
    })->name('tentang');

    
    // Posts Management (Dashboard)
    Route::prefix('dashboard/posts')->name('dashboard.posts.')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
    });
    
    // Posts CRUD
    Route::resource('posts', PostController::class)->except(['index', 'show']);
    
    // Like Post (AJAX Compatible)
    Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])->name('posts.like');
    
    // Comments
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    
    // PDF Export (Placeholder)
    // Route::get('/posts/{post}/pdf', [PdfController::class, 'download'])->name('posts.pdf');

    // PDF Export
    Route::get('/posts/{post}/pdf', [PdfController::class, 'download'])->name('posts.pdf');
    Route::get('/posts/{post}/pdf/preview', [PdfController::class, 'stream'])->name('posts.pdf.preview');
    
    // Admin Routes
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        
        // Comments Management
        Route::get('/comments', [App\Http\Controllers\Admin\CommentController::class, 'index'])->name('comments.index');
        Route::patch('/comments/{comment}/approve', [App\Http\Controllers\Admin\CommentController::class, 'approve'])->name('comments.approve');
        Route::patch('/comments/{comment}/reject', [App\Http\Controllers\Admin\CommentController::class, 'reject'])->name('comments.reject');
        Route::delete('/comments/{comment}', [App\Http\Controllers\Admin\CommentController::class, 'destroy'])->name('comments.destroy');
        
        // Posts Management
        Route::get('/posts', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('posts.index');
        Route::patch('/posts/{post}/status', [App\Http\Controllers\Admin\PostController::class, 'updateStatus'])->name('posts.updateStatus');
        Route::delete('/posts/{post}', [App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('posts.destroy');
        
        // Users Management
        Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
        Route::delete('/users/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');
    });
});

// Public Profile
Route::get('/profile/{nim}', [ProfileController::class, 'show'])->name('profile.show');

// API Routes (for AJAX)
Route::middleware('auth')->group(function () {
    Route::post('/api/theme/update', [App\Http\Controllers\Api\ThemeController::class, 'update']);
});