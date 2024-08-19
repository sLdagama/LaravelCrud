<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request) {
        $users = User::query(); 
        $users->when($request->search, function($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        });

        $users = $users->paginate(6);
        return view('home', compact('users'));
    }
}
