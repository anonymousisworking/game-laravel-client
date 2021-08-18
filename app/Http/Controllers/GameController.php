<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $location   = Location::getById($user->location);

        return response()->json([
            'user'      => $user,
            'location'  => $location['location'],
            'closestLocations'  => $location['closestLocations'],
        ]);
    }
}
