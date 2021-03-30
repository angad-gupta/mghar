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

Route::group(['middleware' => ['auth:subscriber']], function () {
    Route::post('/ime_transaction/save', 'SubscriberController@store');
});

Route::prefix('subscriber')->group(function () {
    Route::get('/', 'SubscriberController@index');
});
