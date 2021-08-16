<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
	// return response()
			// ->json([
				// 'name' => 'hom',
				// 'city' => 'Odessa'
			// ])
			// // ->header('Content-type', 'application/json')
			// ->header('Access-Control-Allow-Origin', '*');
			
	return view('index');
});


Route::get('/test', function() {
	return response()
			->json([
				'name' => 'hom',
				'city' => 'Odessa'
			])
			->header('Content-type', 'application/json');
			// ->header('Access-Control-Allow-Origin', '*');
			
});