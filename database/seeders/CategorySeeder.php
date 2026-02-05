<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Teknologi',
                'slug' => 'teknologi',
                'description' => 'Artikel tentang perkembangan teknologi terkini',
                'icon' => '💻',
                'color' => '#3B82F6',
            ],
            [
                'name' => 'Sains',
                'slug' => 'sains',
                'description' => 'Penelitian dan penemuan ilmiah',
                'icon' => '🔬',
                'color' => '#10B981',
            ],
            [
                'name' => 'Pendidikan',
                'slug' => 'pendidikan',
                'description' => 'Tips belajar dan pengembangan diri',
                'icon' => '📚',
                'color' => '#F59E0B',
            ],
            [
                'name' => 'Kesehatan',
                'slug' => 'kesehatan',
                'description' => 'Informasi kesehatan dan gaya hidup sehat',
                'icon' => '🏥',
                'color' => '#EF4444',
            ],
            [
                'name' => 'Bisnis',
                'slug' => 'bisnis',
                'description' => 'Entrepreneurship dan manajemen bisnis',
                'icon' => '💼',
                'color' => '#8B5CF6',
            ],
            [
                'name' => 'Seni & Budaya',
                'slug' => 'seni-budaya',
                'description' => 'Karya seni dan kekayaan budaya',
                'icon' => '🎨',
                'color' => '#EC4899',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}