<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function main()
    {
        return view('main');
    }

    public function location()
    {
        return view('location');
    }
}
