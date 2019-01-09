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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Gt all events
Route::get('events', 'EventController@index');

// Get Single event
Route::get('event/{id}', 'EventController@show');

// attend an event
Route::post('event/attend', [
    'uses' => 'EventController@attend',
    'middleware' => 'auth.jwt'
    ]);
 
// Create an event
Route::post('event', [
    'uses' => 'EventController@store',
    'middleware' => 'auth.jwt'
    ]);

// Update an event
Route::put('event',[
    'uses' => 'EventController@store',
    'middleware' => 'auth.jwt'
    ]);

// Delete an event
Route::delete('event/{id}', [
    'uses' => 'EventController@destroy',
    'middleware' => 'auth.jwt'
    ]);


// SignUp a User
Route::post('user', 'UserController@signup');

// SignIn a User
Route::post('user/signin', 'UserController@signin');
