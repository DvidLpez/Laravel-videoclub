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

Route::get('/', 'HomeController@index');

// Route::get('auth/login', function () {
//     return view('auth.login');
// });

// Route::get('auth/logout', function () {
//     return 'Logout usuario';
// });

Route::get('catalog', 'CatalogController@getIndex');

Route::get('catalog/show/{id}', 'CatalogController@getShow');


Route::get('catalog/create', 'CatalogController@getCreate');

Route::get('catalog/edit/{id}', 'CatalogController@getEdit');

// Autentificacion de usuarios
Auth::routes();

Route::get('/home', 'CatalogController@getIndex');


// modificiar y crear peliculas

Route::post('catalog/create', 'CatalogController@postCreate');

Route::put('catalog/edit/{id}', 'CatalogController@putEdit');


Route::put('catalog/rent/{id}', 'CatalogController@putRent');
Route::put('catalog/return/{id}','CatalogController@putReturn');
Route::delete('catalog/delete/{id}','CatalogController@deleteMovie');
