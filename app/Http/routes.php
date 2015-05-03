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
	'vote/get-manager/{teamId}',
	[
		'middleware' => 'auth',
		'uses' => 'VoteController@getManagersForTeam'
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

Route::get(
    'data',
    [
        'uses' => 'DataController@index'
    ]
);

Route::get(
    'data/{userId}',
    [
        'uses' => 'DataController@user'
    ]
);

Route::get(
    'data/{userId}/overall/{criteria?}',
    [
        'uses' => 'DataController@overall'
    ]
);

Route::get(
    'data/{userId}/votes/all',
    [
        'uses' => 'DataController@votesAll'
    ]
);

Route::get(
    'data/{userId}/votes/positive',
    [
        'uses' => 'DataController@votesPositive'
    ]
);

Route::get(
    'data/{userId}/votes/negative',
    [
        'uses' => 'DataController@votesNegative'
    ]
);

Route::get(
    'data/{userId}/votes/neutral',
    [
        'uses' => 'DataController@votesNeutral'
    ]
);

Route::get(
    'data/{orgId?}/rank',
    [
        'uses' => 'DataController@rank'
    ]
);

Route::get(
    'data/{userId}/most/{type}',
    [
        'uses' => 'DataController@most'
    ]
);

Route::get(
    'data/{userId}/radar/percent',
    [
        'uses' => 'DataController@getPositivePercentPerCriteria'
    ]
);

Route::get(
    'data/{userId}/radar/average',
    [
        'uses' => 'DataController@getAverageScorePerCriteria'
    ]
);


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
