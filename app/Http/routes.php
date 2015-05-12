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

Route::get('dashboard', 'DashboardController@index');

Route::get('gigs/old', 'GigController@index1');
Route::get('gigs/cat', 'GigController@index2');
Route::get('gigs/delete/{id}', 'GigController@delete');
Route::get('gigs/{id}', 'GigController@viewGig');
Route::model('gigs', 'App\Gig');
Route::resource('gigs', 'GigController');

Route::get('clients/loc', 'ClientController@index2');
Route::model('clients', 'App\Client');
Route::resource('clients', 'ClientController');
Route::get('clients/delete/{id}', 'ClientController@delete');

Route::get('invoices/created', 'InvoiceController@index1');
Route::get('invoices/total', 'InvoiceController@index2');
Route::get('invoices/paid', 'InvoiceController@index3');
Route::get('invoices/{id}/download', 'InvoiceController@downloadPdf');
Route::get('invoices/{id}/email', 'InvoiceController@emailPdf');
Route::get('invoices/{id}/print', 'InvoiceController@printPdf');
Route::get('invoices/{id}/toggle', 'InvoiceController@toggle');
Route::model('invoices', 'App/Invoice');
Route::resource('invoices', 'InvoiceController');

Route::get('employees/pay', 'EmployeeController@index3');
Route::get('employees/job', 'EmployeeController@index2');
Route::model('employees', 'App\Employee');
Route::resource('employees', 'EmployeeController');
Route::get('employees/delete/{id}', 'EmployeeController@delete');

Route::get('gear/cat', 'GearController@index2');
Route::model('gear', 'App\Gear');
Route::resource('gear', 'GearController');
Route::get('gear/delete/{id}', 'GearController@delete');

Route::get('packages/cat', 'PackageController@index2');
Route::model('packages', 'App\Package');
Route::resource('packages', 'PackageController');
Route::get('packages/delete/{id}', 'PackageController@delete');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);