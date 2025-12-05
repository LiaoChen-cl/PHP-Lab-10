<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // register handle
    public function register(Request $request)
    {
        // authentication input
        $incomingData = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'min:3', 'max:255'],
        ]);

        // encryption password 
        $incomingData['password'] = bcrypt($incomingData['password']);

        // set up user
        $user = User::create($incomingData); //back to instance

       
        // Handle the registration logic here
        return redirect('/'); // regiter sucessfully go back to home
    }

    // login handle
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'loginName' => ['required', 'string'],
            'loginPassword' => ['required', 'string'],
        ]);

        if (auth()->attempt([
            'name' => $credentials['loginName'],
            'password' => $credentials['loginPassword'],
        ])) {
            $request->session()->regenerate(); // prevent session fixation 攻击
            return redirect('/page1'); // /redirect to page1
        }

        // login failed back to home
        return redirect('/')->withErrors([
            'loginError' => 'The provided credentials do not match our records.',
        ]);
    }

    // sigh out
    public function logout(Request $request)
    {
        auth()->logout(); // log out user
        return redirect('/'); // redirect to home page after logout
    }

    public function page1()
    {
        $user = auth()->user()?->name; // login in get name, not null

        return view('page1', ['user' => $user]); // go page1.blade.php
    }


}
