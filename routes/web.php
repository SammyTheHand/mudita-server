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

Route::get('promotion', function() {
	return view('promotion');
});

Route::get('instruction', function() {
	return view('instruction');
});

Route::get('investor', function() {
	return view('investor');
});

Route::group(['prefix' => 'api/v1', 'middleware' => 'cors'], function() {
	Route::apiResource('events', 'API\EventsController', ['only' => ['index', 'show']]);
	Route::apiResource('fences', 'API\FencesController', ['only' => ['index', 'show']]);
	Route::get('events/{event}/fences', 'API\FencesController@index');
	Route::get('events/{event}/fences/{fence}', 'API\FencesController@index');
	Route::post('triggers','API\TriggersController@store');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/triggers', 'TriggersController@index');
	
	Route::resource('events', 'EventsController');

	Route::resource('/events/{event}/fences', 'EventFencesController', ['except' => ['index', 'show']]);

	Route::post('/events/{event}/invitations', 'EventInvitationsController@store');
});

Auth::routes(['verify' => true]);
    





