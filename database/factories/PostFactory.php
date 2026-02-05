<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->sentence(6);
        
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $title,
            'slug' => \Str::slug($title),
            'excerpt' => fake()->paragraph(2),
            'content' => fake()->paragraphs(8, true),
            'thumbnail' => null,
            'status' => fake()->randomElement(['draft', 'published']),
            'views' => fake()->numberBetween(0, 1000),
            'published_at' => fake()->dateTimeBetween('-1 month', 'now'),
        ];
    }

    public function published()
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'published',
            'published_at' => now(),
        ]);
    }

    public function draft()
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'draft',
            'published_at' => null,
        ]);
    }
}