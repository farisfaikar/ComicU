<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Comic;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Review::created([
            'user_id'   => 1,
            'comic_id'  => 1,
            'title'     => 'One Piece',
            'content'   => 'Sangat bagus lah ',
            'stars'     => 5,
        ]);
        Review::created([
            'user_id'   => 1,
            'comic_id'  => 2,
            'title'     => 'Detektif Konan',
            'content'   => 'Lumayan Bagus ',
            'stars'     => 4,
        ]);
        Review::created([
            'user_id'   => 1,
            'comic_id'  => 3,
            'title'     => 'Tobang',
            'content'   => 'Jelek Amat Anjirrrr ko wkwk mending gausah buat komik haha',
            'stars'     => 4,
        ]);
    }
}
