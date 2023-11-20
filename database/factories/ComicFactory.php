<?php

namespace Database\Factories;

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
            'category_id' => fake()->numberBetween(0, 1),
        ];
    }
}
