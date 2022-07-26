<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:255'],
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
