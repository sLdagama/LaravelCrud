<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Mail\HelloMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function create() {
        return view('create');
    } // mostra a tela de cadastro do usuário
    public function store(UserStoreRequest $request) {
        $input = $request->validated();
        //$input['senha'] = bcrypt($input['senha']); - grava criptografado a senha
        if (!empty($input['user_file']) && $input['user_file']->isValid()) {
            $file = $input['user_file'];
            $path = $file->store('users');
            $input['user_file'] = $path;
        }
        User::create($input);
        Mail::to($input['email'])->send(new HelloMail());
        
        return Redirect::route('home')->with('success', 'Usuário criado com sucesso!');
    } // faz o cadastro do usuário
    
    Public function destroy(User $user) {
        $user->delete();
        return Redirect::route('home')->with('success', 'Usuário excluído com sucesso!');
    } // faz a exclusão do usuário

    public function edit(User $user) {
        return view('edit', compact('user'));
    } // mostra a tela de edição

    public function update(UserStoreRequest $request, User $user) {
        $input = $request->validated();
        
        if (!empty($input['user_file']) && $input['user_file']->isValid()) {
            $file = $input['user_file'];
            $path = $file->store('users');
            $input['user_file'] = $path;
        }

        $user->update($input);
        return Redirect::route('home')->with('success', 'Usuário editado com sucesso!');
    } // faz a edição
}
