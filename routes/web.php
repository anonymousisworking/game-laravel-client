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

Route::get('/test', function() {
	return response()
			->json([
				'name' => 'hom',
				'city' => 'Odessa'
			])
			->header('Content-type', 'application/json');
			// ->header('Access-Control-Allow-Origin', '*');
});

Route::get('/', [GameController::class, 'index'])->name('index');

Route::group(['middleware' => 'guest'], function() {
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::get('/registration', [UserController::class, 'registrationForm'])->name('registrationForm');
    Route::post('/registration', [UserController::class, 'registration'])->name('registration');
});

Route::group(['middleware' => 'auth'], function() {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/init', [GameController::class, 'init']);
    Route::get('/change-location/{id}', [UserController::class, 'changeLocation']);
    Route::get('/ws-token', [GameController::class, 'wsToken']);
    Route::get('/user/reset', [UserController::class, 'reset']);
});
