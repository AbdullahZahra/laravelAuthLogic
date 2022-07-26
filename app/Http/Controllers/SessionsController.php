<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (auth()->attempt($attributes))
        {
            session()->regenerate();
            
            return redirect('/')->with('success', 'Welcome back!');
        }

        return back()->withErrors([
            'email' => 'The credentials you entered did not match our records. Please try again.',
        ]);
    }
    
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Your are now logged out.');
    }
}
