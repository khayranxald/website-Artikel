<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->id === $this->route('post')->user_id || $this->user()->isAdmin();
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
            'content.required' => 'Konten artikel wajib diisi.',
            'thumbnail.image' => 'File harus berupa gambar.',
            'thumbnail.max' => 'Ukuran gambar maksimal 2MB.',
        ];
    }

    protected function prepareForValidation()
    {
        if (empty($this->excerpt) && !empty($this->content)) {
            $this->merge([
                'excerpt' => Str::limit(strip_tags($this->content), 200),
            ]);
        }
    }
}