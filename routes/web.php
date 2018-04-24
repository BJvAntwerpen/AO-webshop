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

Route::get('/product', function() {
	return view('product_details');
});

Route::get('/cart', function() {
	return view('shopping_cart');
});

Route::get('/category', function() {
	return view('categories');
});

Route::get('/products', function() {
	return view('products');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
