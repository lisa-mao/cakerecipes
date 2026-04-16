<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Recipe;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $category = Category::firstOrCreate(["name" => "Cakes"]);

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);


        $recipes = [
            [
                'id' => 1,
                'title' => 'Classic Vanilla Layer Cake',
                'total_time' => '1 Hr 30 Min',
                'description' => 'A beautifully moist vanilla sponge cake with rich buttercream frosting. Perfect for birthdays and celebrations!',
                'prep_time' => '30 min',
                'serving' => 12,
            ],
            [
                'id' => 2,
                'title' => 'Decadent Chocolate Fudge Cake',
                'total_time' => '1 Hr 15 Min',
                'description' => 'An intense, dark chocolate cake featuring a gooey fudge center and smooth ganache. Every chocolate lover\'s dream.',
                'prep_time' => '20 min',
                'serving' => 10,
            ],
            [
                'id' => 3,
                'title' => 'Zesty Lemon Poppy Seed Loaf',
                'total_time' => '55 Min',
                'description' => 'A bright, citrusy loaf cake with crunchy poppy seeds and a sweet lemon glaze. Great for brunch or afternoon tea!',
                'prep_time' => '15 min',
                'serving' => 8,
            ]
        ];

        foreach ($recipes as $recipeData) {
            Recipe::create([
                'title' => $recipeData['title'],
                'total_time' => $recipeData['total_time'],
                'description' => $recipeData['description'],
                'prep_time' => $recipeData['prep_time'],
                'serving' => $recipeData['serving'],
                'user_id' => $user->id,

            ]);
        }

    }
}
