<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@home')->name('home');
Route::get('/cart', 'HomeController@cart')->name('cart');
