<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
        
        if($request['password']!=$user->password){
            $request['password']=Hash::make($request->password);
        }
        
        $user->update($request->all());
        
        return redirect()->route('perfil.index',Auth::id())
            ->with('success', 'User updated successfully');
    }
}