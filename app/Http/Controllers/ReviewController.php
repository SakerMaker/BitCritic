<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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

    public function review($id)
    {
        $review=Review::find($id);
        $user=User::find($review->id_user);
        $comments=Comment::all()->where("id_review","=",$id);
        $users=array();
        foreach ($comments as $single_comment) {
            $users[]=User::join("comments","users.id","=","comments.id_user")->select("users.id as id","users.name as name","users.profile_photo_path as profile_photo_path","comments.id as id_commnent","comments.content as comment_content","comments.created_at as created_at","comments.updated_at as updated_at")->where("comments.id","=",$single_comment->id)->groupBy("users.id")->get();
        }
        $game=Game::find($review->id_game);

        return view('review', compact('review'))->with("users",$users)->with("game",$game)->with("user",$user);
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

        return redirect()->route('home')
            ->with('success', 'Review deleted successfully');
    }
}
