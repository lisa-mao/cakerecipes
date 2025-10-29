<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);


        Recipe::factory()->create([
            $recipes = [
                [
                    'id' => 1,
                    'title' => 'Classic Vanilla Layer Cake',
                    'total_time' => '1 Hr 30 Min',
                    'description' => 'A beautifully moist vanilla sponge cake with rich buttercream frosting. Perfect for birthdays and celebrations!',
                    'prep_time' => '30 min',
                    'servings' => 12,
                    'categories' => [['name' => 'Vanilla', 'color' => 'blue'], ['name' => 'Layered', 'color' => 'indigo'], ['name' => 'Dessert', 'color' => 'pink']]
                ],
                [
                    'id' => 2,
                    'title' => 'Decadent Chocolate Fudge Cake',
                    'total_time' => '1 Hr 15 Min',
                    'description' => 'An intense, dark chocolate cake featuring a gooey fudge center and smooth ganache. Every chocolate lover\'s dream.',
                    'prep_time' => '20 min',
                    'servings' => 10,
                    'categories' => [['name' => 'Chocolate', 'color' => 'yellow'], ['name' => 'Fudge', 'color' => 'orange'], ['name' => 'Rich', 'color' => 'red']]
                ],
                [
                    'id' => 3,
                    'title' => 'Zesty Lemon Poppy Seed Loaf',
                    'total_time' => '55 Min',
                    'description' => 'A bright, citrusy loaf cake with crunchy poppy seeds and a sweet lemon glaze. Great for brunch or afternoon tea!',
                    'prep_time' => '15 min',
                    'servings' => 8,
                    'categories' => [['name' => 'Fruity', 'color' => 'green'], ['name' => 'Loaf', 'color' => 'teal'], ['name' => 'Brunch', 'color' => 'gray']]
                ]
            ]
        ]);

    }
}
