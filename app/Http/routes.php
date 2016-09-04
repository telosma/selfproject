<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('welcome', function(){
	return view('welcome');
})->name('welcome');

Route::get('signup', function(){
	return view('user.signup');
})->name('signup');

Route::post('sign-up', [
	'as' => 'sign-up',
	'uses' => 'UserController@postSignup',
]);