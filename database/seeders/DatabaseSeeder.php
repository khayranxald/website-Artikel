<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed admin dan user
        $this->call(AdminSeeder::class);
        
        // Seed categories
        $this->call(CategorySeeder::class);
        
        // Create additional dummy users and posts for testing
        \App\Models\User::factory(5)->create()->each(function ($user) {
            \App\Models\Post::factory(3)->create([
                'user_id' => $user->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
                'status' => 'published',
            ]);
        });
    }
}