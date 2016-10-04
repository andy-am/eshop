<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index');

Route::get('/categories', 'CategoryController@index');
Route::get('/product/{id}', 'ProductController@show');

Route::get('/product/addToFavourites/{id}', 'ProductController@addToFavourites');
Route::get('/product/removeFromFavourites/{id}', 'ProductController@removeFromFavourites');

Route::get('/product/addToBasket/{id}', 'ProductController@addToBasket');
Route::get('/product/removeFromBasket/{id}', 'ProductController@removeFromBasket');

Route::get('/order/basket', 'ProductController@basket');
Route::post('/order/updateBasket', 'ProductController@updateBasket');
Route::get('/order/proceedToCheckoutStep_1', 'ProductController@proceedToCheckoutStep_1');

Route::get('/user/favourites', 'UserController@favourites');

