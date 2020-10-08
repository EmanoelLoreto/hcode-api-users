<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index() {

        return User::all();

    }

    public function store(Request $request) {

        $user = User::create([
            "name"=>$request->input("name"),
            "email"=>$request->input("email"),
            "password"=>$request->input("password")
        ]);
    
        return $user;
    
    }

    public function update(User $user, Request $request) {
        $user->name = $request->input("name");
        $user->email = $request->input("email");

        $user->save();
    
        return $user;
    
    }

    public function remove(User $user) {

        $user->delete();
    
        return response()->json([
            'message'=>'Usuário excluído com sucesso'
        ]);
    
    }
}
