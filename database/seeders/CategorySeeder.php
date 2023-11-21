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
                'color' => '#FF0000',
            ],
            [
                'category_name' => 'History',
                'color' => '#FFFFFF',
            ],
            [
                'category_name' => 'Action',
                'color' => '#FF0000',
            ],
            [
                'category_name' => 'Romance',
                'color' => '#123456',
            ],
            [
                'category_name' => 'Sci-Fi',
                'color' => '#FF00AA',
            ]
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
