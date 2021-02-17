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



Route::group(['prefix' => 'admin', 'middleware' => ['auth','permission']], function () {
    
       
    Route::get('subscription', ['as' => 'subscription.index', 'uses' => 'SubscriptionController@index']);

    Route::get('subscription/appendPackage', ['as' => 'subscription.appendPackage', 'uses' => 'SubscriptionController@appendPackage']);

    Route::post('subscription/store', ['as' => 'subscription.store', 'uses' => 'SubscriptionController@store']);

    Route::post('subscription/update', ['as' => 'subscription.update', 'uses' => 'SubscriptionController@update']);

});