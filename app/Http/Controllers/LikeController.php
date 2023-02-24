<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;

/**
 * Class LikeController
 * @package App\Http\Controllers
 */
class LikeController extends Controller
{

    public function index()
    {
        $likes = Like::paginate();

        return view('like.index', compact('likes'))
            ->with('i', (request()->input('page', 1) - 1) * $likes->perPage());
    }

    public function create()
    {
        $like = new Like();
        return view('like.create', compact('like'));
    }

    public function store(Request $request)
    {
        request()->validate(Like::$rules);

        $like = Like::create($request->all());

        return redirect()->route('likes.index')
            ->with('success', 'Like created successfully.');
    }

    public function show($id)
    {
        $like = Like::find($id);

        return view('like.show', compact('like'));
    }

    public function edit($id)
    {
        $like = Like::find($id);

        return view('like.edit', compact('like'));
    }

    public function update(Request $request, Like $like)
    {
        request()->validate(Like::$rules);

        $like->update($request->all());

        return redirect()->route('likes.index')
            ->with('success', 'Like updated successfully');
    }

    public function destroy($id)
    {
        $like = Like::find($id)->delete();

        return redirect()->route('likes.index')
            ->with('success', 'Like deleted successfully');
    }
}
