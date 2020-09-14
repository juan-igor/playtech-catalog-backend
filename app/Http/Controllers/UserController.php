<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.users.management', ['users' => User::paginate(10)]);
    }

    public function add()
    {
        return view('pages.users.add');
    }

    public function edit($id)
    {
        $user = User::where('id', $id);

        if($user->exists()){
            return view('pages.users.edit', ['user' => $user->first()]); 
        } else {
            return redirect()->away('/sistema/usuarios');
        }
    }

    public function create(UserRequest $request)
    {
        return view('pages.users.management', ['users' => User::paginate(10)]);
    }

    public function update($id, UserRequest $request)
    {
        $user = User::where('id', $id);

        if($user->exists()){
            return view('pages.users.edit', ['user' => $user->first()]); 
        } else {
            return view('pages.users.management', ['users' => User::paginate(10)]);
        }
    }

    public function delete($id)
    {
        $user = User::where('id', $id);

        if($user->exists()){
            return view('pages.users.management', ['users' => User::paginate(10)]); 
        } else {
            return view('pages.users.management', ['users' => User::paginate(10)]);
        }
    }
}
