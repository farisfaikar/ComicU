<?php

namespace Database\Seeders;

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
        $comic->comic_name = "jujutsu kaisen";
        $comic->synopsis = "ada seorang anak sebatang kara";
        $comic->author = "hajime";
        $comic->stock = 200;
        $comic->category_id = 1;
        $comic->save();
        
    }
}
