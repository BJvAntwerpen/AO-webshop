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

Route::get('/product/{category_id}/{product_id}', 'ProductDetailsController@index');

Route::get('/addToCart', 'ShoppingCartController@addToCart');

Route::get('/clear', 'ShoppingCartController@clearCart');

Route::get('/updateCart', 'ShoppingCartController@updateCartItem');

Route::get('/deleteItem', 'ShoppingCartController@deleteCartItem');

Route::get('/cart', 'ShoppingCartController@index');

Route::get('/category', 'CategoryController@index');

Route::get('/products/{id}', 'ProductController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
