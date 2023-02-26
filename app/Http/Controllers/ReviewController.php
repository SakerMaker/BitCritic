<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use App\Models\Game;
use Illuminate\Http\Request;

/**
 * Class ReviewController
 * @package App\Http\Controllers
 */
class ReviewController extends Controller
{
  
    public function index()
    {
        $reviews = Review::paginate(5);

        return view('review.index', compact('reviews'))
            ->with('i', (request()->input('page', 1) - 1) * $reviews->perPage());
    }

   
    public function create()
    {
        $allGames = Game::all();
        $allUsers = User::all();
        $review = new Review();
        return view('review.create', compact('review','allUsers','allGames'));
    }

    
    public function store(Request $request)
    {
        request()->validate(Review::$rules);

        $review = Review::create($request->all());

        return redirect()->back()
            ->with('success', 'Review created successfully.');
    }

    public function show($id)
    {
        $review = Review::find($id);

        return view('review.show', compact('review'));
    }

 
    public function edit($id)
    {
        $review = Review::find($id);
        $allGames = Game::all();
        $allUsers = User::all();
        return view('review.edit', compact('review','allGames','allUsers'));
    }

    public function update(Request $request, Review $review)
    {
        request()->validate(Review::$rules);

        $review->update($request->all());

        return redirect()->route('reviews.index')
            ->with('success', 'Review updated successfully');
    }

    public function destroy($id)
    {
        $review = Review::find($id)->delete();

        return redirect()->route('reviews.index')
            ->with('success', 'Review deleted successfully');
    }
}
