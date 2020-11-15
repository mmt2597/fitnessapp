<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\WelcomeController@index');

Route::group([
	'middleware' => 'auth',
	'namespace' => 'App\Http\Controllers'
], function() {
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('/leads', 'LeadController@index')->name('index');
	Route::get('/leads/list', 'LeadController@list')->name('lead.list');

	Route::get('/leads/add', 'LeadController@create')->name('lead.add');
	Route::post('/leads/save', 'LeadController@store')->name('lead.store');

	Route::get('/leads/view/{lead}', 'LeadController@view')->name('lead.view');
	Route::post('/leads/update', 'LeadController@update')->name('lead.update');
});
Auth::routes();

