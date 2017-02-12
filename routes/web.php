<?php

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

Route::get('tweets/', 'TweetsController@index');
Route::get('tweets/create', 'TweetsController@create');
Route::get('tweets/{id}/edit', 'TweetsController@edit');
Route::put('tweets/{id}', 'TweetsController@update');
Route::post('tweets', 'TweetsController@store');


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

Route::get('/home', 'HomeController@index');
