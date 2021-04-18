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
    
       
    Route::get('video_ads', ['as' => 'video_ads.index', 'uses' => 'VideoAdsController@index']);

    Route::get('video_ads/create', ['as' => 'video_ads.create', 'uses' => 'VideoAdsController@create']);
    Route::post('video_ads/store', ['as' => 'video_ads.store', 'uses' => 'VideoAdsController@store']);

    Route::get('video_ads/edit/{id}', ['as' => 'video_ads.edit', 'uses' => 'VideoAdsController@edit'])->where('id','[0-9]+');
    Route::put('video_ads/update/{id}', ['as' => 'video_ads.update', 'uses' => 'VideoAdsController@update'])->where('id','[0-9]+');

    Route::get('video_ads/delete/{id}', ['as' => 'video_ads.delete', 'uses' => 'VideoAdsController@destroy'])->where('id','[0-9]+');
        
         
});