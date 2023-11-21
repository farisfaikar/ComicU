<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comic = new Comic();
        $comic->comic_name = "Jujutsu Kaisen";
        $comic->synopsis = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacinia tellus eros, sit amet pharetra elit luctus eu. Proin in orci quis tortor dictum aliquet. Suspendisse potenti. Cras consectetur eros malesuada sagittis placerat. In sed pellentesque lacus. Proin malesuada lacus et leo eleifend, eget imperdiet arcu feugiat. Cras accumsan sodales ultrices. Integer pellentesque vel vulputate erat consectetur, sed congue nunc posuere. Proin congue orci dolor, vel semper tellus lobortis et. Suspendisse ultrices neque at pellentesque commodo. Proin eu ipsum sodales, facilisis libero et, consectetur ex.";
        $comic->author = "Hajime";
        $comic->stock = 200;
        $comic->category_id = Category::inRandomOrder()->first()->id;
        $comic->save();

        Comic::factory(10)->create();
    }
}
