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
Route::group(['middleware' => ['apiAuth']], function () {
    Route::get('/movie', 'App\\Http\\Controllers\\Api\\MovieController@index')->name('movie.list');
    Route::get('/movie/{id}', 'App\\Http\\Controllers\\Api\\MovieController@show')->name('movie.show');

    Route::get('/review', 'App\\Http\\Controllers\\Api\\ReviewController@index')->name('review.list');
    Route::get('/review/{id}', 'App\\Http\\Controllers\\Api\\ReviewController@show')->name('review.show');
    Route::post('/review', 'App\\Http\\Controllers\\Api\\ReviewController@store')->name('review.store');

    Route::get('/user', 'App\\Http\\Controllers\\Api\\UserController@index')->name('user.list');

    Route::get('/logout', 'App\\Http\\Controllers\\Api\\AuthController@logout')->name('auth.logout');
});

Route::post('/user', 'App\\Http\\Controllers\\Api\\UserController@store')->name('user.store');

Route::post('/login', 'App\\Http\\Controllers\\Api\\AuthController@login')->name('auth.login');
