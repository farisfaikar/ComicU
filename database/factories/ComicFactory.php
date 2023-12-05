<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comic>
 */
class ComicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comic_name' => fake()->name(),
            'synopsis' => fake()->realTextBetween(500, 1000),
            'author' => fake()->name(),
            'stock' => fake()->numberBetween(0, 100),
            'comic_photo' => fake()->imageUrl(),
            'category_id' => Category::inRandomOrder()->first()->id,
            'created_at' => now()->subDays(rand(0, 7)),
            'updated_at' => now()->subDays(rand(0, 7)),
        ];
    }
}
