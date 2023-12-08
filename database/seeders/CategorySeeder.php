<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'category_name' => 'Fiction',
                'color' => 'cyan',
            ],
            [
                'category_name' => 'History',
                'color' => 'blue',
            ],
            [
                'category_name' => 'Action',
                'color' => 'red',
            ],
            [
                'category_name' => 'Romance',
                'color' => 'pink',
            ],
            [
                'category_name' => 'Sci-Fi',
                'color' => 'purple',
            ],
            [
                'category_name' => 'Comedy',
                'color' => 'yellow',
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'category_name' => $category['category_name'],
                'color' => $category['color'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
