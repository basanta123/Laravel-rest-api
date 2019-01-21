<?php

use Illuminate\Http\Request;

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
// Fallback route incase anything goes wrong
Route::fallback(function () {
    return response()->json(['error' => 'Resource not found.'], 404);
})->name('fallback');

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('details', 'API\UserController@details');
    Route::post('logout', 'API\UserController@logout');
    Route::resource('posts', 'API\PostController');
});
