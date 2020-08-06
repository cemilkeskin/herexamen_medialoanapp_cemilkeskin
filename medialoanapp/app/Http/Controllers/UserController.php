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

//    public function navigateEdit(Request $req)
//    {
//        $this->authorize('admin');
//        $id = $req->route('id');
//        $users = User::find($id);
//        return view('content.edituser', ['users' => $users]);
//    }
    public function navigateEdit($id)
    {
        $this->authorize('admin');
        $users = User::find($id);
        return view('content.edituser', ['users' => $users]);
    }

    public function editUser(Request $req, $id)
    {
        $this->authorize('admin');
        $req->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required',

        ]);

        $users = User::find($id);
        $users->name =  $req->get('name');
        $users->email = $req->get('email');
        $users->password = bcrypt($req->get('password'));
        $users->role = $req->get('role');
        $users->save();

        return redirect('/users');
    }

    public function deleteUser($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/users');
    }
}
