<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function create() {
        return view('create');
    }
    public function store(UserStoreRequest $request) {
        $input = $request->validated();
        User::create($input);
        return Redirect::route('home')->with('success', 'Usuário criado com sucesso!');
    }
    
    Public function destroy(User $user) {
        $user->delete();
        return Redirect::route('home')->with('success', 'Usuário excluído com sucesso!');
    }

    public function edit(User $user) {
        return view('edit', compact('user'));
    }

    public function update(UserStoreRequest $request, User $user) {
        $input = $request->validated();
        $user->update($input);
        return Redirect::route('home')->with('success', 'Usuário editado com sucesso!');
    }
}
