<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@home')->name('home');
Route::get('/cart', 'HomeController@cart')->name('cart');

Auth::routes();

Route::get('/user', 'UserController@showProfile')->name('user.profile.show')->middleware('auth');
Route::patch('/user/{user}', 'UserController@updateProfile')->name('user.profile.update')->middleware('auth');
Route::patch('/user/{user}/email', 'UserController@verifyEmail')->name('user.email.verify')->middleware('auth');

Route::resource('orders', 'OrderController')->only(['index', 'create', 'show'])->middleware('auth');

