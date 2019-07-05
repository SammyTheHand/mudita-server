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
	
	Route::resource('events', 'EventsController');

	Route::post('/events/{event}/fences', 'EventFencesController@store');
	Route::patch('/events/{event}/fences/{fence}', 'EventFencesController@update');

	Route::post('/events/{event}/invitations', 'EventInvitationsController@store');
});

Auth::routes();
    





