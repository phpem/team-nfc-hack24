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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get(
	'vote/{rating?}',
	[
        'middleware' => 'auth',
        'uses' => 'VoteController@rateManager'
	]
);

Route::post(
	'vote',
	[
		'middleware' => 'auth',
		'uses' => 'VoteController@registerVote'
	]
);

Route::get(
	'dashboard',
	[
		'middleware' => 'auth',
		'uses'       => 'DashboardController@index'
	]
);
Route::get(
	'account',
	[
		'middleware' => 'auth',
        'uses'       => 'AccountController@index'
	]
);

Route::get(
    'account/teams',
    [
        'middleware' => 'auth',
        'uses'       => 'AccountController@teams'
    ]
);


Route::get(
    'team/{teamId}',
    [
        'middleware' => 'auth',
        'uses'       => 'TeamController@index'
    ]
);

Route::get(
    'profile/{userId}',
    [
        'middleware' => 'auth',
        'uses'       => 'ProfileController@index'
    ]
);


Route::get(
    'search',
    [
        'middleware' => 'auth',
        'uses'       => 'SearchController@index'
    ]
);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
