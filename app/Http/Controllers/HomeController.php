<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comic;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Comment;
class HomeController extends Controller
{
    public function index()
    {
        $comics = Comic::all();

        return view('home', compact('comics'));
    }

    // comic detail
    public function comic_details($id)
    {
        $comic=comic::find($id);
        $review=review::find($id);

        return view('home.comic_details', compact ('comic'),compact('review'));
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

