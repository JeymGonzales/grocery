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
	return redirect()->guest('/login');
});

Route::group(['middleware' => 'auth'], function () {

	Route::get('/', 'HomeController@index');
	Route::get('/home', 'HomeController@index');

	Route::get('/products', 'ProductController@index');
	Route::get('/products/create', 'ProductController@form');
	Route::get('/products/update/{id}', 'ProductController@form');

	Route::post('/products/', 'ProductController@store');
	Route::post('/products/update/{id}', 'ProductController@update');

	Route::get('/categories', 'CategoryController@index');
	Route::get('/categories/create', 'CategoryController@form');
	Route::get('/categories/update/{id}', 'CategoryController@form');

	Route::post('/categories/', 'CategoryController@store');
	Route::post('/categories/update/{id}', 'CategoryController@update');

});
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();
