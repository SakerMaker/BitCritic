<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Review;
use App\Models\User;
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

    public function panelIndex()
    {
        $games= Game::paginate(5);

        return view('game.panelIndex', compact('games'))
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

    public function game($id)
    {
        $games=Game::find($id);
        $reviews=$games->review()->paginate();
        $users=array();
        foreach ($reviews as $single_review) {
            $users[]=User::leftJoin("reviews","users.id","=","reviews.id_user")->select("users.id as id","users.name as name","users.profile_photo_path as profile_photo_path","reviews.id as id_review","reviews.title as review_title","reviews.content as review_content","reviews.created_at as created_at","reviews.updated_at as updated_at")->where("reviews.id_game","=",$id)->groupBy("users.id")->get();
        }
        $review=$games->review()->count();
        return view('game.game', compact('games'))->with("review",$review)->with("reviews",$users);
    }

    public function create()
    {
        $game = new Game();
        return view('game.create', compact('game'));
    }

    public function store(Request $request)
    {
        request()->validate(Game::$rules);

        $datos=$request->all();
        
        if($request->hasFile('image')){
            $file=$request['image'];
            $destinationPath="img/";
            $filename=time() . "-" . $file->getClientOriginalName();
            $uploadSuccess= $request['image']->move($destinationPath, $filename);
            $datos['image']=$destinationPath . $filename;
        }else{
            $datos['image']="img/j-sin-foto.png";
        }
;
        $game = Game::create($datos);

         return redirect()->route('games.panelIndex')
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

        $datos=$request->all();

        if($request->hasFile('image')){
            $file=$request['image'];
            $destinationPath="img/";
            $filename=time() . "-" . $file->getClientOriginalName();
            $uploadSuccess= $request['image']->move($destinationPath, $filename);
            $datos['image']=$destinationPath . $filename;
        }

        $game->update($datos);

        return redirect()->route('games.panelIndex')
            ->with('success', 'Game updated successfully');
    }

    public function destroy($id)
    {
        $game=Game::find($id);
        if($game['image']!="img/j-sin-foto.png"){
            unlink($game['image']);
        }

        $game->delete();

        return redirect()->route('games.panelIndex')
            ->with('success', 'Game deleted successfully');
    }
}
