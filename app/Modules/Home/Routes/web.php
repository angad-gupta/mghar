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

Route::get('subscriber-register', ['as' => 'subscriber-register', 'uses' => 'HomeController@subscriberRegisterForm']);

Route::post('subscriber-register/store', ['as' => 'subscriber-register.store', 'uses' => 'HomeController@subscriberRegister']);

Route::get('subscriber-account', ['as' => 'subscriber-account', 'uses' => 'HomeController@subscriberAccount']);

Route::post('subscriber-login', ['as' => 'subscriber-login-post', 'uses' => 'SubscriberController@subscriberAuthenticate']);

Route::get('subscriber-logout', ['as' => 'subscriber-logout', 'uses' => 'SubscriberController@subscriberLogout']);


Route::get('/auth/redirect/{provider}', 'AuthController@redirect');
Route::get('/callback/{provider}', 'AuthController@callback');


Route::group(['prefix' => 'subscriber', 'middleware' => ['auth:subscriber']], function () {

    Route::get('subscriber-dashboard', ['as' => 'subscriber-dashboard', 'uses' => 'SubscriberController@dashboard']);

});
