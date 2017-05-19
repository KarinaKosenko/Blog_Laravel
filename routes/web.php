<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
	Route::group(['prefix' => '/articles'], function () {
		Route::get('/', 'Articles@index');
		Route::get('/one/{id}', 'Articles@one');
		Route::get('/add' ,'Articles@add');
		Route::get('/edit/{id}', 'Articles@edit');
		Route::get('/delete/{id}', 'Articles@delete');
	});
});


Route::group(['namespace' => 'Client'], function () {
	Route::group(['prefix' => 'articles'], function () {
		Route::get('/', 'Articles@index');
		Route::get('/one/{id}', 'Articles@one');
	});
	
	Route::get('registration', 'Registration@register');
});

