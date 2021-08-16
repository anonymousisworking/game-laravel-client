<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('main');
        }

        return redirect()->back()->with('_errors', 'Email or password is wrong');
    }

    public function registrationForm()
    {
        return view('registration');
    }

    public function registration(Request $request)
    {
        $request->validate([
            'email'     => 'required|email|unique:users',
            'login'     => 'required|string|between:3,16',
            'password'  => 'required|string|min:6',
            'sex'       => 'required|boolean'
        ]);

        User::add($request->all(), $request->getClientIp());

        return redirect()->route('game');
    }
}
