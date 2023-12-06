<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $rec_comics = Comic::paginate(6)->shuffle();
        $popu_comics = Comic::all();
        $reviews = Review::all();
        return view('home', compact('rec_comics', 'popu_comics', 'reviews'));
    }
}
