<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@home')->name('home');
Route::get('/cart', 'HomeController@cart')->name('cart');
Route::get('/delivery', 'HomeController@delivery')->name('delivery');
Route::post('/delivery/info', 'HomeController@saveDeliveryInfo')->name('delivery.create');
Route::get('/promos', 'HomeController@promos')->name('promos');
Route::get('/checkout', 'HomeController@checkout')->name('checkout');
Route::get('/success', function () {
    return view('pages.success');
})->name('success');

Auth::routes();

Route::get('/user', 'UserController@showProfile')->name('user.profile.show')->middleware('auth');
Route::patch('/user/{user}', 'UserController@updateProfile')->name('user.profile.update')->middleware('auth');
Route::patch('/user/{user}/email', 'UserController@verifyEmail')->name('user.email.verify')->middleware('auth');

Route::post('orders', 'HomeController@storeOrder')->name('orders.store');
Route::resource('orders', 'OrderController')->only(['index', 'show'])->middleware('auth');

