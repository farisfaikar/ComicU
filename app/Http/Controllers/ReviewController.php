<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;




class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('review.index-review', compact('reviews'));
    }

    public function create()
    {
        return view('review.create-review');
    }

    public function store(Request $request)
    {
        $validatedRequest = $request->validate([   
        'user_id' => 'required',
        'comic_id' => 'required',
        'title' => 'required',
        'content' => 'required',
        'stars' => 'required',
    ]);

        Review::create($validatedRequest);

        return redirect()->route('review.index')
            ->with('success', 'Review created successfully.');
    }

    public function show(Review $review)
    {
    }

    public function edit(Review $review)
    {
        return view('review.edit-review', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $validatedRequest = $request->validate([   
            'user_id' => 'required',
            'comic_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'stars' => 'required',
        ]);
    
        $review->update($validatedRequest);
    
        return redirect()->route('review.index');
    }
    

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('review.index')
            ->with('success', 'Review deleted successfully.');
    }
}
