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

Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/events', 'EventsController@index');
	Route::get('/events/create', 'EventsController@create');
	Route::get('/events/{event}', 'EventsController@show');
	Route::get('/events/{event}/edit', 'EventsController@edit');
	Route::patch('/events/{event}', 'EventsController@update');
	Route::post('/events', 'EventsController@store');

	Route::post('/events/{event}/fences', 'EventFencesController@store');
	Route::patch('/events/{event}/fences/{fence}', 'EventFencesController@update');
});

Auth::routes();
    





