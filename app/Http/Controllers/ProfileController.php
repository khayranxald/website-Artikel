<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // HAPUS __construct() atau kosongkan jika tidak diperlukan

    // Show public profile
    public function show($nim)
    {
        $user = User::where('nim', $nim)->firstOrFail();
        
        $posts = $user->posts()
            ->published()
            ->with(['category', 'likes'])
            ->latest()
            ->paginate(9);
        
        $stats = [
            'total_posts' => $user->posts()->count(),
            'published_posts' => $user->posts()->where('status', 'published')->count(),
            'total_views' => $user->totalViewsReceived(),
            'total_likes' => $user->totalLikesReceived(),
        ];
        
        return view('profile.show', compact('user', 'posts', 'stats'));
    }

    // Show edit form
    public function edit()
    {
        return view('profile.edit');
    }

    // Update profile
    public function update(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email,' . $user->id,
            'prodi' => 'nullable|string|max:255',
            'angkatan' => 'nullable|string|max:4',
            'bio' => 'nullable|string|max:500',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'avatar.image' => 'File harus berupa gambar.',
            'avatar.max' => 'Ukuran avatar maksimal 1MB.',
        ]);

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($validated);

        return redirect()->route('profile.edit')->with('success', 'Profile berhasil diperbarui!');
    }

    // Update password
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'current_password.required' => 'Password saat ini wajib diisi.',
            'password.required' => 'Password baru wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // Check current password
        if (!Hash::check($validated['current_password'], auth()->user()->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai.']);
        }

        auth()->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('success', 'Password berhasil diperbarui!');
    }
}