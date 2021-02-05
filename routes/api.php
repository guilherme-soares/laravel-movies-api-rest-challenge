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
	Route::get('/movie', 'App\\Http\\Controllers\\Api\\MovieController@index');
	Route::get('/movie/{id}', 'App\\Http\\Controllers\\Api\\MovieController@show');
	Route::get('/review', 'App\\Http\\Controllers\\Api\\ReviewController@index');
	Route::get('/review/{id}', 'App\\Http\\Controllers\\Api\\ReviewController@show');
	Route::post('/review', 'App\\Http\\Controllers\\Api\\ReviewController@store');
	Route::get('/user', 'App\\Http\\Controllers\\Api\\UserController@index');
});

Route::post('/user', 'App\\Http\\Controllers\\Api\\UserController@store');

Route::post('/login', 'App\\Http\\Controllers\\Api\\AuthController@login');
