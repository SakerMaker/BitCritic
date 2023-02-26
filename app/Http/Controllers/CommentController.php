<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Game;
use App\Models\Review;
use Illuminate\Http\Request;


class CommentController extends Controller
{

    public function index()
    {
        $comments = Comment::paginate();

        return view('comment.index', compact('comments'))
            ->with('i', (request()->input('page', 1) - 1) * $comments->perPage());
    }


    public function create()
    {
        $allUsers=User::all();
        $allReviews=Review::all();
        $comment = new Comment();
        return view('comment.create', compact('comment','allUsers','allReviews'));
    }

    public function store(Request $request)
    {
        request()->validate(Comment::$rules);

        $comment = Comment::create($request->all());

        return redirect()->back()
            ->with('success', 'Comment created successfully.');
    }

    public function show($id)
    {
        $comment = Comment::find($id);

        return view('comment.show', compact('comment'));
    }

    public function edit($id)
    {
        $comment = Comment::find($id);
        $allUsers = User::all();
        $allReviews = Review::all();
        return view('comment.edit', compact('comment','allUsers','allReviews'));
    }

    public function update(Request $request, Comment $comment)
    {
        request()->validate(Comment::$rules);

        $comment->update($request->all());

        return redirect()->back('comments.index')
            ->with('success', 'Comment updated successfully');
    }

    public function destroy($id)
    {
        $comment = Comment::find($id)->delete();

        return redirect()->back()
            ->with('success', 'Comment deleted successfully');
    }
}
