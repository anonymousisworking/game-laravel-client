<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GameController;

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




Route::group(['middleware' => 'guest'], function() {
    Route::get('/registration', [UserController::class, 'registrationForm'])->name('registrationForm');
    Route::post('/registration', [UserController::class, 'registration'])->name('registration');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::post('/index', [GameController::class, 'index'])->name('index');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/main', [GameController::class, 'main'])->name('main');
//    Route::get('/location', [GameController::class, 'location'])->name('location');
});
