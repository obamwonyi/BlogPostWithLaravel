<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //

    //handle the actual register route for the get method
    public function create()
    {
        return view('register.register');
    }

    //handle the post method route for the registration 
    public function store()
    {

        $attributes = request()->validate(
            [
                'name' => 'required|max:255',
                'username' => 'required|max:255|min:3|unique:users,username',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required|min:7|max:255'
            ]
            );

            //this is for hashing the password . 

            $user = User::create($attributes);

            auth()->login($user);

            session()->flash('success','Your account has been created.');



            return redirect('/');
    }
}
