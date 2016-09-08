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



Route::group(['middleware' => ['web']], function(){
	Route::get('/', [
        'as' => 'home',
        'uses' => 'UserController@getHome',
    ]);

	// Route::get('entrydetail',function(){
	// 	return view('entrydetail');
	// });
	Route::get('signup', function(){
		return view('user.signup');
	})->name('signup');

	Route::post('sign-up', [
		'as' => 'sign-up',
		'uses' => 'UserController@postSignup',
	]);

	Route::get('signin', function(){
		return view('user.signin');
	})->name('signin');

	Route::post('sign-in', [
		'as' => 'sign-in',
		'uses' => 'UserController@postSignin',
	]);

	Route::get('signout', [
		'as' => 'signout',
		'uses' => 'UserController@getSignout',
	]);

	Route::get('profile/{user_id}', [
		'uses' => 'UserController@getProfile',
		'as'   => 'user.profile',
	]);

    Route::resource('entry', 'EntryController');
    Route::resource('comment', 'CommentController');

    Route::post('user-follow', [
    	'as' => 'userfollow.store',
    	'uses' => 'UserController@postFollowUser'
    ]);

    Route::post('user-unfollow', [
    	'as' => 'userfollow.delete',
    	'uses' => 'UserController@postUnFollow',
    ]);
});