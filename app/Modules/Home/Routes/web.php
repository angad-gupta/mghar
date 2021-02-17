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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('videos', ['as' => 'videos', 'uses' => 'HomeController@Videos']);
Route::get('video-detail', ['as' => 'video-detail', 'uses' => 'HomeController@VideoDetail']);

Route::get('khelau', ['as' => 'khelau', 'uses' => 'HomeController@Khelau']);
Route::get('khelaujuhari-detail', ['as' => 'khelaujuhari-detail', 'uses' => 'HomeController@KhelaujuhariDetail']);

Route::get('blog-detail', ['as' => 'blog-detail', 'uses' => 'HomeController@BlogDetail']);


Route::get('about-us', ['as' => 'about-us', 'uses' => 'HomeController@aboutUs']);
Route::get('term-use', ['as' => 'term-use', 'uses' => 'HomeController@termUse']);
Route::get('privacy-policy', ['as' => 'privacy-policy', 'uses' => 'HomeController@privacyPolicy']);
Route::get('faq', ['as' => 'faq', 'uses' => 'HomeController@Faq']);

Route::get('subscriber-login', ['as' => 'subscriber-login', 'uses' => 'HomeController@subscriberLogin']);
Route::get('subscriber-register', ['as' => 'subscriber-register', 'uses' => 'HomeController@subscriberRegisterForm']);

Route::post('subscriber-register/store', ['as' => 'subscriber-register.store', 'uses' => 'HomeController@subscriberRegister']);

Route::get('subscriber-account', ['as' => 'subscriber-account', 'uses' => 'HomeController@subscriberAccount']);

Route::post('subscriber-login', ['as' => 'subscriber-login-post', 'uses' => 'SubscriberController@subscriberAuthenticate']);

Route::get('subscriber-logout', ['as' => 'subscriber-logout', 'uses' => 'SubscriberController@subscriberLogout']);


Route::get('auth/redirect/{provider}', ['as' => 'auth/redirect/{provider}', 'uses' => 'AuthController@redirect']);
Route::get('callback/{provider}', ['as' => 'callback/{provider}', 'uses' => 'AuthController@callback']);

Route::get('add-to-wishlist', ['as' => 'add-to-wishlist', 'uses' => 'SubscriberController@addToWishlist']);
Route::get('remove-from-wishlist', ['as' => 'remove-from-wishlist', 'uses' => 'SubscriberController@removeFromWishlist']);

Route::get('my-wishlist', ['as' => 'my-wishlist', 'uses' => 'HomeController@myWishlist']);


Route::group(['prefix' => 'subscriber', 'middleware' => ['auth:subscriber']], function () {

    Route::get('sdashboard', ['as' => 'sdashboard', 'uses' => 'SubscriberController@dashboard']);

    Route::put('subscriber/update/{id}', ['as' => 'subscriber.update', 'uses' => 'SubscriberController@subscriberProfileUpdate'])->where('id', '[0-9]+');

	Route::post('subscriber-update-password', ['as' => 'subscriber-update-password', 'uses' => 'SubscriberController@updateSubscriberPassword']);

});
