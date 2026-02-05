<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $categories = [
            ['name' => 'Teknologi', 'icon' => '💻', 'color' => '#3B82F6'],
            ['name' => 'Sains', 'icon' => '🔬', 'color' => '#10B981'],
            ['name' => 'Pendidikan', 'icon' => '📚', 'color' => '#F59E0B'],
            ['name' => 'Kesehatan', 'icon' => '🏥', 'color' => '#EF4444'],
            ['name' => 'Bisnis', 'icon' => '💼', 'color' => '#8B5CF6'],
        ];
        
        $category = fake()->randomElement($categories);
        
        return [
            'name' => $category['name'],
            'slug' => \Str::slug($category['name']),
            'description' => fake()->sentence(),
            'icon' => $category['icon'],
            'color' => $category['color'],
        ];
    }
}