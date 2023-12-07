<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

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

        return view('home.comic_details', compact ('comic'));
    }
}
