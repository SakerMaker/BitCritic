<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\Game;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        $comment=$user->comment()->count();
        $reviews=$user->review()->count();

        $allreviews=Review::all()->where("id_user","=",$id);
        $games=array();
        foreach ($allreviews as $single_review) {
            $games[]=Game::join("reviews","games.id","=","reviews.id_game")->select("games.id as game_id","games.title as game_title","games.image as game_image","games.genero as game_genero","reviews.id as id_review","reviews.title as review_title","reviews.content as review_content","reviews.created_at as created_at","reviews.updated_at as updated_at")->where("reviews.id","=",$single_review->id)->groupBy("games.id")->get();
        }

        return view('perfil', compact('user'))->with("comment",$comment)->with("reviews",$reviews)->with("allreviews",$games);
    }

    public function edit($id) {
        $user = User::find($id);

        return view('perfilEdit', compact('user'));
    }

}