<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    //


    public function index()
    {
        return view('login.login');
    }


    public function login()
    {
        $attributes = request()->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
            );

        if(auth()->attempt($attributes))
        {
            //always regenerate users session after login 
            return redirect('/')->with('success','Welcome Back');
        }

        session()->regenerate();
        return back()->withErrors(['email' => 'Your provided credentials could not be verified']);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success','Goodbye');

    }
}
