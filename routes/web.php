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
Route::post('/competitions/update', 'CompetitionsController@update');
Route::post('/competitions/destroy', 'CompetitionsController@destroy');

Route::get('/competitors', 'CompetitorsController@index');
Route::post('/competitors/store', 'CompetitorsController@store');
Route::get('/competitors/{comp_id}/edit', 'CompetitorsController@edit')->name('competitors.edit');
Route::post('/competitors/update', 'CompetitorsController@update');
Route::post('/competitors/destroy', 'CompetitorsController@destroy');

Route::get('/clashes', 'ClashesController@index');
Route::post('/clashes/store', 'ClashesController@store');
Route::get('/clashes/{clash_id}/edit', 'ClashesController@edit')->name('clashes');
Route::post('/clashes/update', 'ClashesController@update');
Route::post('/clashes/destroy', 'ClashesController@destroy');
Route::post('updateClashStatus', 'ClashesController@updateClashStatus');

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/matches/{clash_id}/edit', 'MatchController@edit')->name('matchedit');
});
Route::get('/matches/{clash_id}/show', 'MatchController@show')->name('matches');

Route::post('addPoint', 'MatchController@addPoint');
Route::post('addPunishment', 'MatchController@addPunishment');
Route::get('getPoints', 'MatchController@getPoints');
Route::get('getPunishments', 'MatchController@getPunishments');
Route::post('saveClashTime', 'MatchController@saveClashTime');
Route::get('getClashTime', 'MatchController@getClashTime');
Route::get('isClashOver', 'MatchController@isClashOver');

Route::get('/organization', 'OrganizationController@index');
Route::post('/organization/store', 'OrganizationController@store');
Route::get('/organization/{id}/edit', 'OrganizationController@edit')->name('organization.edit');
Route::post('/organization/update', 'OrganizationController@update');
Route::post('/organization/destroy', 'OrganizationController@destroy');

Route::get('/profiles/{user}', 'ProfilesController@index');

Route::get('/success', 'AdministratorController@success');
Route::get('/unsuccess', 'AdministratorController@unsuccess');

// Deletable...
Route::get('/p/create', 'PostController@create');
Route::post('/p', 'PostController@store');

Route::get('/profiles/{user}', 'ProfilesController@index')->name('profile.show');
