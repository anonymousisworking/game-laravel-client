<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Location;
use Illuminate\Http\Request;

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
        $user       = Auth::user()->select('id', 'login', 'level', 'location')->first();
        $location   = Location::where('id', $user->location)->with('closestLocations')->select('id', 'name', 'type', 'image', 'locations_coords')->first();
        // $location   = Location::find($user->location);

        // dd($location);
        // dd($user, $location);
        // dd($user, get_class_methods($user));

        $closestLocations = $location->closestLocations;
        unset($location->closestLocations);

        return response()->json([
            'user'      => $user,
            'location'  => $location,
            'closestLocations'  => $closestLocations,
        ]);
    }
}
