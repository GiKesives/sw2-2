<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
               $users = User::all();

        return view ('users.index', [
            'users' => $users
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('create.show');
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json("Usuário não encontrado");
        };

            $user->update($request->all());

            return response()->json($user);

    }

    public function delete($id)
    {
        $user = User::find($id);

        $user->delete();

        return $user;
    }
}
