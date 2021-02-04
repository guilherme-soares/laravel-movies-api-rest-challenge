<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Protected routes
Route::group(['middleware' => ['apiAuth']], function() {
	Route::get('/movies', 'App\\Http\\Controllers\\Api\\MovieController@index');
	Route::get('/movies/{id}', 'App\\Http\\Controllers\\Api\\MovieController@show');
	Route::get('/reviews', 'App\\Http\\Controllers\\Api\\ReviewController@index');
	Route::get('/reviews/{id}', 'App\\Http\\Controllers\\Api\\ReviewController@show');
	Route::post('/reviews', 'App\\Http\\Controllers\\Api\\ReviewController@store');
	Route::get('/users', 'App\\Http\\Controllers\\Api\\UserController@index');
});

Route::post('/users', 'App\\Http\\Controllers\\Api\\UserController@store');

Route::post('/login', 'App\\Http\\Controllers\\Api\\AuthController@login');
