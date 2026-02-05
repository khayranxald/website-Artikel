<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status' => 'required|in:draft,published',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Judul artikel wajib diisi.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists' => 'Kategori tidak valid.',
            'content.required' => 'Konten artikel wajib diisi.',
            'thumbnail.image' => 'File harus berupa gambar.',
            'thumbnail.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp.',
            'thumbnail.max' => 'Ukuran gambar maksimal 2MB.',
            'status.required' => 'Status artikel wajib dipilih.',
        ];
    }

    protected function prepareForValidation()
    {
        // Auto-generate excerpt if not provided
        if (empty($this->excerpt) && !empty($this->content)) {
            $this->merge([
                'excerpt' => Str::limit(strip_tags($this->content), 200),
            ]);
        }
    }
}