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

Route::get('/','MainController@home')->name('index');
//Login routes
Route::get('/login','LoginController@login')->name('login');
Route::post('/auth','LoginController@auth')->name('auth');
Route::post('/logout','LoginController@logout')->name('logout');

Route::get('/store','MainController@home');
Route::get('/store/{id}','ProductsController@storeView');

Route::get('/cart','ShoppingCartsController@index')->name('cart');
Route::resource('in_shopping_carts','InShoppingCartsController', ['only' => 'store','destroy']);

//Auth::routes();
Route::resource('products','ProductsController');

//Rutas de usuarios para el Front
Route::get('/register','UsersController@create')->name('new_user');
Route::resource('users','UsersController');
Route::get('/account','MainController@account')->name('account');

Route::get('/home', 'HomeController@index');
