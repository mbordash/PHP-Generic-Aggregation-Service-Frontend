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

use App\Apikey;

Route::model('apikeys', 'Apikey');

Route::bind('apikeys', function($value, $route) {
	return Apikey::whereSlug($value)->where('users_id', '=', Auth::user()->id)->where('approved', '=', true)->whereNull('deleted_at')->first();
});

Route::resource('apikeys', 'ApikeysController');


Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('aggregation', 'AggregationController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

