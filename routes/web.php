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
	// Route::get('/projects/create', 'ProjectsController@create');
	Route::get('/events/{event}', 'EventsController@show');
	Route::post('/events', 'EventsController@store');
});

Auth::routes();
    





