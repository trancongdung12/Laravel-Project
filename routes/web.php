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

//admin
Route::get('admin/dashboard','Admin\DashboardController@index')->middleware('checklogin');

//Product
Route::get('product/create','Admin\ProductController@index')->middleware('checklogin');
Route::get('product/show','Admin\ProductController@show')->middleware('checklogin');
Route::post('product/store','Admin\ProductController@store');
Route::delete('product/{id}','Admin\ProductController@destroy');
Route::get('product/{id}/edit','Admin\ProductController@edit')->middleware('checklogin');;
Route::patch('product/{id}','Admin\ProductController@update');

//User
Route::get('users/show','Admin\UserController@show')->middleware('checklogin');;
Route::delete('users/{id}','Admin\UserController@destroy');

//Home
Route::get('/','User\HomeController@index');
Route::get('/home','User\HomeController@index')->name('user.home');
Route::get('/details/{id}','User\HomeController@details');
//Search
 Route::get('/search','User\SearchController@index')->name('user.search');
// Route::post('/search/{txt}','User\SearchController@index');
//Cart
Route::get('/cart','User\CartController@index')->name('user.cart');
Route::post('/cart/{id}','User\CartController@store');
Route::post('/details/cart/{id}','User\CartController@storeCart');
Route::patch('/cart/{id}','User\CartController@update');
Route::delete('/cart/{id}','User\CartController@destroy');
Route::post('/discount/cart/','User\CartController@discount');
//Payment
Route::get('/payment','User\PaymentController@index');
Route::post('/payment','User\PaymentController@store');

//Login
Route::get('/home/login','Auth\LoginController@index')->name('auth.login');
Route::post('/home/login','Auth\LoginController@login');

//Register
Route::get('/home/register','Auth\RegisterController@index');
Route::post('/home/register','Auth\RegisterController@register');

//Logout
Route::get('/home/logout','Auth\LogoutController@logout');
