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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home/{catid}', 'HomeController@index')->name('home');
Route::get('/home/article/{articleID}', 'ArticleController@index')->name('article');

Route::get('/shoppingcart', 'ShoppingcartController@index')->name('shoppingcart');
Route::get('/shoppingcart/add/{articleid}', 'ShoppingcartController@addToCart')->name('addtocart');
Route::get('/shoppingcart/delete/{articleid}', 'ShoppingcartController@deleteItem')->name('deleteItem');

Route::get('/order/', 'OrderController@index')->name('order');