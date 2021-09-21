<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class GameController extends Controller
{
    public function index()
    {
        return view(Auth::check() ? 'main' : 'index');
    }

    public function location()
    {
        return view('location');
    }

    public function init()
    {
        $user       = Auth::user()->getUser();
        $location   = Location::getById($user->loc);

        return response()->json([
            'user'      => $user,
            'location'  => $location['location'],
            'closestLocations'  => $location['closestLocations'],
        ]);
    }

    public function wsToken()
    {
        $response = new Response(generateToken());
        return $response->withCookie(cookie('name'));
    }
}
