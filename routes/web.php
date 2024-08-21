<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('laravel', function () {
    return view('welcome');
}); // rota padrão do laravel quando criamos ele cria o index
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/create', [UserController::class, 'create'])->name('users.create'); //tela de cadastro
Route::post('/store', [UserController::class, 'store'])->name('users.store'); // faz a requisição do cadastro
Route::get('/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy'); //faz a requisição para deletar
Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit'); //tela de edição
Route::put('/{user}/update', [UserController::class, 'update'])->name('users.update'); //faz a requisição para editar

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index')->name('login.index');
    Route::post('/stor', 'store')->name('login.store');
    Route::get('/logout', 'logout')->name('login.logout');
});
