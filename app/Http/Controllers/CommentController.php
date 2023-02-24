<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
        $comment = new Comment();
        return view('comment.create', compact('comment'));
    }

    public function store(Request $request)
    {
        request()->validate(Comment::$rules);

        $comment = Comment::create($request->all());

        return redirect()->route('comments.index')
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

        return view('comment.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        request()->validate(Comment::$rules);

        $comment->update($request->all());

        return redirect()->route('comments.index')
            ->with('success', 'Comment updated successfully');
    }

    public function destroy($id)
    {
        $comment = Comment::find($id)->delete();

        return redirect()->route('comments.index')
            ->with('success', 'Comment deleted successfully');
    }
}
