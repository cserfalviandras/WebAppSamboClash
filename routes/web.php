<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/spectator', 'SpectatorController@index');
Route::get('/administrator', 'AdministratorController@index');


// Deletable...
Route::get('/p/create', 'PostController@create');
Route::post('/p', 'PostController@store');

Route::get('/profiles/{user}', 'ProfilesController@index')->name('profile.show');
