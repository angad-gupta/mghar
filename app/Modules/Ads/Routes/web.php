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
    
       
    Route::get('ads', ['as' => 'ads.index', 'uses' => 'AdsController@index']);

    Route::get('ads/create', ['as' => 'ads.create', 'uses' => 'AdsController@create']);
    Route::post('ads/store', ['as' => 'ads.store', 'uses' => 'AdsController@store']);

    Route::get('ads/edit/{id}', ['as' => 'ads.edit', 'uses' => 'AdsController@edit'])->where('id','[0-9]+');
    Route::put('ads/update/{id}', ['as' => 'ads.update', 'uses' => 'AdsController@update'])->where('id','[0-9]+');

    Route::get('ads/delete/{id}', ['as' => 'ads.delete', 'uses' => 'AdsController@destroy'])->where('id','[0-9]+');
        
         
});