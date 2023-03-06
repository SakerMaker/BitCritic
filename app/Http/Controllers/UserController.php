<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(10);

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }


    public function create()
    {
        $user = new User();
        return view('user.create', compact('user'));
    }


    public function store(Request $request)
    {
        request()->validate(User::$rules);

        $datos = $request->all();

        $datos['password'] = Hash::make($request->password);

        if ($request->hasFile('profile_photo_path')) {
            $file = $request['profile_photo_path'];
            $destinationPath = "img/";
            $filename = time() . "-" . $file->getClientOriginalName();
            $uploadSuccess = $request['profile_photo_path']->move($destinationPath, $filename);
            $datos['profile_photo_path'] = $destinationPath . $filename;
        } else {
            $datos['profile_photo_path'] = "img/profileDefault.png";
        }

        if ($request->hasFile('banner_photo_path')) {
            $file = $request['banner_photo_path'];
            $destinationPath = "img/";
            $filename = time() . "-" . $file->getClientOriginalName();
            $uploadSuccess = $request['banner_photo_path']->move($destinationPath, $filename);
            $datos['banner_photo_path'] = $destinationPath . $filename;
        } else {
            $datos['banner_photo_path'] = "img/bannerDefault.png";
        }

        $user = User::create($datos);
        $user->assignRole('User');

        return redirect()->route('home')
            ->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }


    public function edit($id)
    {
        $user = User::find($id);
        $edit = True;
        return view('user.edit', compact('user', 'edit'));
    }

    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);

        $datos = $request->all();

        if ($request->hasFile('profile_photo_path')) {
            $file = $request['profile_photo_path'];
            $destinationPath = "img/";
            $filename = time() . "-" . $file->getClientOriginalName();
            $uploadSuccess = $request['profile_photo_path']->move($destinationPath, $filename);
            $datos['profile_photo_path'] = $destinationPath . $filename;
        }

        if ($request->hasFile('banner_photo_path')) {
            $file = $request['banner_photo_path'];
            $destinationPath = "img/";
            $filename = time() . "-" . $file->getClientOriginalName();
            $uploadSuccess = $request['banner_photo_path']->move($destinationPath, $filename);
            $datos['banner_photo_path'] = $destinationPath . $filename;
        }

        if ($datos['password'] != $user->password) {
            $datos['password'] = Hash::make($request->password);
        }

        $user->update($datos);

        if (str_contains(url()->previous(),"perfil")) {
            return redirect()->route('perfil.index',Auth::id())
            ->with('success', 'User updated successfully');
        } else {
            return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
        }
        
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user['profile_photo_path'] != "img/profileDefault.png") {
            if(file_exists($user['profile_photo_path'])){
                unlink($user['profile_photo_path']);
            }
        }
        if ($user['banner_photo_path'] != "img/bannerDefault.png") {
            if(file_exists($user['banner_photo_path'])){
                unlink($user['banner_photo_path']);
            }
        }



        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
