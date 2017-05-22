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
	Route::get('/', 'ArticlesController@index');
	
	Route::group(['prefix' => '/articles'], function () {
		Route::get('/', 'ArticlesController@index');
		Route::get('/one/{id}', 'ArticlesController@one');
		Route::get('/add' ,'ArticlesController@add');
		Route::get('/edit/{id}', 'ArticlesController@edit');
		Route::get('/delete/{id}', 'ArticlesController@delete');
	});
	
	Route::group(['prefix' => 'guestbook'], function () {
		Route::get('/', 'GuestbookController@index');
		Route::get('/add', 'GuestbookController@add');
		Route::get('/edit/{id}', 'GuestbookController@edit');
		Route::get('/delete/{id}', 'GuestbookController@delete');
	});
});


Route::group(['namespace' => 'Client'], function () {
	Route::get('/', 'ArticlesController@index');
	
	Route::group(['prefix' => 'articles'], function () {
		Route::get('/', 'ArticlesController@index');
		Route::get('/one/{id}', 'ArticlesController@one');
	});
	
	Route::group(['prefix' => 'guestbook'], function () {
		Route::get('/', 'GuestbookController@index');
		Route::get('/add', 'GuestbookController@add');
	});
	
	Route::get('registration', 'RegistrationController@register');
});

