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
    return view('pages.welcome');
});

//Distributors Contoller
Route::resource('distributions', 'DistributionController');


//Dealers Controller
Route::resource('dealers', 'DealerController');

//Companies Controller
Route::resource('companies', 'CompanyController');


//Customers Controller
Route::resource('customers', 'CustomerController');


//Locations Controller
Route::resource('locations', 'LocationController', ['except' => ['create']]);

