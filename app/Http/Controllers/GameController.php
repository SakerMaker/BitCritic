<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

/**
 * Class GameController
 * @package App\Http\Controllers
 */
class GameController extends Controller
{

    public function index()
    {
        $games = Game::paginate();

        return view('game.index', compact('games'))
            ->with('i', (request()->input('page', 1) - 1) * $games->perPage());
    }

    public function create()
    {
        $game = new Game();
        return view('game.create', compact('game'));
    }

    public function store(Request $request)
    {
        request()->validate(Game::$rules);

        $game = Game::create($request->all());

        return redirect()->route('games.index')
            ->with('success', 'Game created successfully.');
    }

    public function show($id)
    {
        $game = Game::find($id);

        return view('game.show', compact('game'));
    }

    public function edit($id)
    {
        $game = Game::find($id);

        return view('game.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        request()->validate(Game::$rules);

        $game->update($request->all());

        return redirect()->route('games.index')
            ->with('success', 'Game updated successfully');
    }

    public function destroy($id)
    {
        $game = Game::find($id)->delete();

        return redirect()->route('games.index')
            ->with('success', 'Game deleted successfully');
    }
}
