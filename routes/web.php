<?php

use App\Tweet;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function() {
    $tweets = App\Tweet::orderBy('created_at', 'desc')->get();

    return view('index', ['tweets' => $tweets]);
});

Route::get('tweets/', 'TweetsController@index')->middleware('can:list,App\Tweet');
Route::get('tweets/create', 'TweetsController@create')->middleware('can:create,App\Tweet');
Route::get('tweets/{tweet}', 'TweetsController@show')->middleware('can:view,tweet');
Route::get('tweets/{tweet}/edit', 'TweetsController@edit')->middleware('can:update,tweet');
Route::put('tweets/{tweet}', 'TweetsController@update')->middleware('can:update,tweet');
Route::post('tweets', 'TweetsController@store')->middleware('can:create,App\Tweet');
Route::delete('tweets/{tweet}', 'TweetsController@destroy')->middleware('can:delete,App\Tweet');

Route::get('users/', 'UsersController@index')->middleware('can:list,App\User');
Route::get('users/create', 'UsersController@create')->middleware('can:create,App\User');
Route::get('users/{user}', 'UsersController@show')->middleware('can:view,user');
Route::get('users/{user}/edit', 'UsersController@edit')->middleware('can:update,user');
Route::put('users/{user}', 'UsersController@update')->middleware('can:update,user');
Route::post('users', 'UsersController@store')->middleware('can:create,App\User');
Route::delete('users/{user}', 'UsersController@destroy')->middleware('can:delete,App\User');

Route::get('/a-propos', function() {
    return 'Ce clone de Twitter vous est proposé par Laravel et Open School Design';
});

Route::get('/contact', function() {
    return 'Écrivez nous à exemple@exemple.org';
});

Route::post('/contact', function() {
    return 'Désolé le formulaire de contact n’est pas encore prêt';
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');
