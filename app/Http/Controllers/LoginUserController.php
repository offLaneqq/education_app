<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {

        // Validate the data
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'string']
        ]);

        // Attemp to login with validated data
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {

            // if succesful redirect to posts.index
            return redirect()->intended(route('posts.index'));
        } else {
            
            // if unsuccesful redict back with error under email
            return back()->withErrors([
                'email' => 'You pass incorrect data'
            ]);

        }

    }

    public function logout(Request $request)
    {
        // Work with web, not API
        Auth::guard('web')->logout();

        // Delete data from cookie
        $request->session()->invalidate(); 

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        return to_route('posts.index');

    }
}
