<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\Category;
use App\Models\Review;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        $rec_comics = Comic::paginate(6)->shuffle();
        $popu_comics = Comic::all();
        $reviews = Review::all();
        $categories = Category::all();

        // Calculate average stars for each comic
        $average_stars = Review::select('comic_id', DB::raw('avg(stars) as average_stars'))
            ->groupBy('comic_id')
            ->pluck('average_stars', 'comic_id');

        // Attach the average stars to each comic
        $rec_comics->each(function ($comic) use ($average_stars) {
            $comic->average_stars = $average_stars[$comic->id] ?? 0;
        });

        // Attach the average stars to each comic
        $popu_comics->each(function ($comic) use ($average_stars) {
            $comic->average_stars = $average_stars[$comic->id] ?? 0;
        });

        return view('home', compact('rec_comics', 'popu_comics', 'reviews', 'categories'));
    }

    public function detail($id)
    {
        $comic=comic::find($id);
        $review=review::find($id);

        return view('detail-comic', compact ('comic','review'));
    }

    public function store(Request $request, $comicId)
    {
    // Memeriksa apakah pengguna sudah login
    if (auth()->check()) {
        Comment::create([
            'user_id' => auth()->user()->id,
            'comic_id' => $comicId,
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('comic.details', $comicId)->with('success', 'Komentar berhasil ditambahkan.');
    } else {
        return redirect()->route('login')->with('error', 'Anda harus login untuk memberikan komentar.');
         } 
    }

}

