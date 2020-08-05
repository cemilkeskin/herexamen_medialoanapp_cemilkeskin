<?php

namespace App\Http\Controllers;
use  App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function showUsers()
    {
        $this->authorize('admin');
        $users = User::all();
        return view('content.user', ['users' => $users]);
    }

    public function navigateUser()
    {
        $this->authorize('admin');
        $users = User::all();
        return view('content.createuser', ['users' => $users]);
    }

    public function createUser(Request $req)
    {
        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'role' => $req->role,
            'password' => bcrypt($req->password),
        ]);
        return redirect()->action('UserController@showUsers');
    }
}
