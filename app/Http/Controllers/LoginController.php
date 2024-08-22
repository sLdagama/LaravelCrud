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
    public function store(LoginStoreRequest $request) {
        $request->validated();

        $user = User::where('email', $request->input('email'))->first();

        if(!$user) {
            return redirect()->route('login.index')->withErrors(['error' => 'Email ou senha inválida']);
        }

        if(!($request->input('senha') === $user->senha)) {
            return redirect()->route('login.index')->withErrors(['error' => 'Email ou senha inválida']);
        }

        Auth::loginUsingId($user->id);

        session(['authenticated_user' => $user]);

        return Redirect::route('home')->with('login.success', 'Seja bem vindo(a) '. $user->name);
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('login.index')->with('logout.success', 'Logout realizado com sucesso!');
    }
}
