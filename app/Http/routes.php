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

Route::get('dashboard', 'HomeController@index');

Route::get('gigs', 'HomeController@gigs');

Route::get('clients', 'HomeController@clients');

Route::get('invoices', 'HomeController@invoices');

Route::get('employees', 'HomeController@employees');

Route::model('gear', 'App\Gear');
Route::resource('gear', 'GearController');

Route::model('packages', 'App\Package');
Route::resource('packages', 'PackageController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);