<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $games=Game::leftJoin("reviews","games.id","=","reviews.id_game")->select("games.id as id","games.title as title","games.description as description","games.image as image","games.fecha_salida as fecha_salida","games.genero as genero",DB::raw("count(reviews.id) as count"))->groupBy("games.id")->orderBy("count","desc")->paginate(3);
        
        return view('home', compact('games'))
            ->with('i', (request()->input('page', 1) - 1) * $games->perPage());
    }
}
