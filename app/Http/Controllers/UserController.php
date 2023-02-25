<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $request['password']=Hash::make($request->password);
        $user = User::create($request->all());
        $user->assignRole('User');
        return redirect()->route('users.index')
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

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

}
