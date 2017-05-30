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


/**
 * Routes for admin panel
 */

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
	
	Route::get('/', 'ArticlesController@index')
		->name('admin.articles.index');
	
	
	Route::group(['prefix' => '/articles'], function () {
		
		Route::get('/', 'ArticlesController@index')
			->name('admin.articles.index');
		
		Route::get('/one/{id}', 'ArticlesController@one')
			->name('admin.articles.one');
		
		Route::get('/add' ,'ArticlesController@add')
			->name('admin.articles.add');
			
		Route::post('/add' ,'ArticlesController@addPost')
			->name('admin.articles.addPost');
			
		Route::get('/edit/{id}', 'ArticlesController@edit')
			->name('admin.articles.edit');
			
		Route::post('/edit/{id}', 'ArticlesController@editPost')
			->name('admin.articles.editPost');
			
		Route::get('/delete/{id}', 'ArticlesController@delete')
			->name('admin.articles.delete');
	});
	
	
	Route::group(['prefix' => 'guestbook'], function () {
		
		Route::get('/', 'GuestbookController@index')
			->name('admin.guestbook.index');
		
		Route::get('/add', 'GuestbookController@add')
			->name('admin.guestbook.add');
			
		Route::post('/add', 'GuestbookController@addPost')
			->name('admin.guestbook.addPost');
			
		Route::get('/edit/{id}', 'GuestbookController@edit')
			->name('admin.guestbook.edit');
			
		Route::post('/edit/{id}', 'GuestbookController@editPost')
			->name('admin.guestbook.editPost');
			
		Route::get('/delete/{id}', 'GuestbookController@delete')
			->name('admin.guestbook.delete');
	});
});


/**
 * Routes for client panel
 */

Route::group(['namespace' => 'Client'], function () {
	
	Route::get('/', 'ArticlesController@index')
		->name('public.articles.index');
	
	Route::group(['prefix' => 'articles'], function () {
		
		Route::get('/', 'ArticlesController@index')
			->name('public.articles.index');
			
		Route::get('/one/{id}', 'ArticlesController@one')
			->name('public.articles.one');
	});
	
	
	Route::group(['prefix' => 'guestbook'], function () {
		
		Route::get('/', 'GuestbookController@index')
			->name('public.guestbook.index');
		
		Route::get('/add', 'GuestbookController@add')
			->name('public.guestbook.add');
			
		Route::post('/add', 'GuestbookController@addPost')
			->name('public.guestbook.addPost');
	});
	
});


/**
 * Routes for register and login
 */

 Route::get('/register', 'AuthController@register')
    ->name('public.auth.register');
	
Route::post('/register', 'AuthController@registerPost')
    ->name('public.auth.registerPost');
	
Route::get('/login', 'AuthController@login')
    ->name('public.auth.login');
	
Route::post('/login', 'AuthController@loginPost')
    ->name('public.auth.loginPost');
	
Route::get('/logout', 'AuthController@logout')
    ->name('public.auth.logout');
	


