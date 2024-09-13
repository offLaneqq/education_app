<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// import to hash password
use Illuminate\Support\Facades\Hash;
use App\Models\User;

// for validation password
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function store(Request $request) {
        
        // validate request
        $request->validate([
            'name' => ['required', 'min:5', 'max: 30', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed', Password::defaults()]
        ]);

        // create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // log in user
        auth()->login($user);

        // redirected user to page
        return to_route('posts.index');

    }
}
