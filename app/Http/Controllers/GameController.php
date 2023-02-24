<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class GameController
 * @package App\Http\Controllers
 */
class GameController extends Controller
{

    public function index()
    {
        //$games = Game::select("*")->leftJoin("reviews","games.id","=","reviews.id_game")->orderBy("reviews.id_game","DESC")->paginate();
        $games=Game::leftJoin("reviews","games.id","=","reviews.id_game")->select("games.id as id","games.title as title","games.description as description","games.image as image","games.fecha_salida as fecha_salida","games.genero as genero",DB::raw("count(reviews.id) as count"))->groupBy("games.id")->orderBy("count","desc")->paginate();
        //$games = Game::paginate();

        return view('game.index', compact('games'))
            ->with('i', (request()->input('page', 1) - 1) * $games->perPage());
    }

    public function resultados()
    {
        $games= Game::paginate(5);

        return view('game.resultados', compact('games'))
            ->with('i', (request()->input('page', 1) - 1) * $games->perPage());
    }

    public function search(Request $request)
    {
        //$games = Game::select("*")->leftJoin("reviews","games.id","=","reviews.id_game")->orderBy("reviews.id_game","DESC")->paginate();
        $games=Game::leftJoin("reviews","games.id","=","reviews.id_game")->select("games.id as id","games.title as title","games.description as description","games.image as image","games.fecha_salida as fecha_salida","games.genero as genero",DB::raw("count(reviews.id) as count"))->where("games.title","LIKE","%".$request->s."%")->groupBy("games.id")->orderBy("count","desc")->paginate();
        //$games = Game::paginate();

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

        return redirect()->route('games.resultados')
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

        return redirect()->route('games.resultados')
            ->with('success', 'Game updated successfully');
    }

    public function destroy($id)
    {
        $game = Game::find($id)->delete();

        return redirect()->route('games.resultados')
            ->with('success', 'Game deleted successfully');
    }
}
