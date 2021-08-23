<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\LocationAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        // dd($request->all());

        // $user = User::where('email', $request->get('email'))->firstOrFail();
        // if (password_verify($request->get('password'), $user->password)) { Auth::login($user);
        if (Auth::attempt($request->only('email', 'password'), $request->get('remember_me'))) {
            return redirect()->route('index');
        }

        return redirect()->back()->with('_errors', 'Email or password is wrong');
    }

    public function changeLocation($locationId)
    {
        $closestLocations = LocationAccess::where('loc_id' , Auth::user()->location)
                                            ->where('access_loc_id', $locationId)->first();

        if ($closestLocations) {
            User::where('id', Auth::user()->id)->update(['location' => $locationId]);
            return Location::getById($locationId);
        }
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

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function reset()
    {
        User::where('id', Auth::user()->id)->update([
            'curhp' => 1,
            'last_restore' => time(),
        ]);
    }
}
