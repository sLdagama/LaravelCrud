<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginStoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Redirect;

class LoginController extends Controller
{
    public function index() {
        return view("login");
    }
    public function store(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required|string'
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if(!$user) {
            return redirect()->route('login.index')->withErrors(['error' => 'Email ou senha inválida']);
        }

        if(!($request->input('senha') === $user->senha)) {
            return redirect()->route('login.index')->withErrors(['error' => 'Email ou senha inválida']);
        }

        return Redirect::route('home')->with('login.success', 'Usuário autenticado com sucesso!');
    }
    public function logout(Request $request) {
        var_dump('logout');
    }
}
