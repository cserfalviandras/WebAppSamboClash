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

Route::get('/competitions', 'CompetitionsController@index'); 
Route::post('/competitions/store', 'CompetitionsController@store');
Route::get('/competitions/{comp_id}/edit', 'CompetitionsController@edit')->name('competitions.edit');

Route::get('/competitors', 'CompetitorsController@index');
Route::post('/competitors/store', 'CompetitorsController@store');

Route::get('/clashes', 'ClashesController@index');
Route::post('/clashes/store', 'ClashesController@store');
Route::get('/clashes/{clash_id}/edit', 'ClashesController@edit')->name('clashes');
Route::post('/clashes/update', 'ClashesController@update');

Route::get('/profiles/{user}', 'ProfilesController@index');

Route::get('/success', 'AdministratorController@success');

// Deletable...
Route::get('/p/create', 'PostController@create');
Route::post('/p', 'PostController@store');

Route::get('/profiles/{user}', 'ProfilesController@index')->name('profile.show');
