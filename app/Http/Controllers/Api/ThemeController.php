<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'theme' => 'required|in:light,dark',
        ]);

        if (auth()->check()) {
            auth()->user()->update([
                'theme' => $validated['theme'],
            ]);
        }

        return response()->json(['success' => true]);
    }
}