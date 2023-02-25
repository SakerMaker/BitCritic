<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PerfilController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $like=$user->like()->count();
        $comment=$user->comment()->count();
        $reviews=$user->review()->count();
        return view('perfil', compact('user'))->with("like",$like)->with("comment",$comment)->with("reviews",$reviews);
    }

    public function edit($id) {
        $user = User::find($id);

        return view('perfilEdit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }
}