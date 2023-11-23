<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comic;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class ReviewController extends Controller
{
    public function __construct(Review $review){
        $this->review=$review;
    } 

    public function index()
    {
        $reviews = Review::paginate(10);
        return view('review.index-review', compact('reviews'));
    }

    public function create()
    {
        $users = User::all();
        $comics = Comic::all();

        return view('review.create-review', compact('users', 'comics'));
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

        return redirect()
            ->route('review.index')
            ->with('success', 'Review created successfully.');
    }

    public function show(Review $review)
    {
        //
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

        return redirect()
            ->route('review.index')
            ->with('success', 'Review deleted successfully.');
    }
        
    public function search(Request $request, Review $review){
        if($request->has('search')){
            $review = review::where('title','LIKE', '%'.$request->search . '%')->paginate(10);
        }
        else {
            $review = review::all();
        }
        
        return view('review.index-review',['reviews'=>$review]);
    
    }
}
