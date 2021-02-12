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
    
       
    Route::get('dynamicblock', ['as' => 'dynamicblock.index', 'uses' => 'DynamicBlockController@index']);

    Route::get('dynamicblock/appendBlock', ['as' => 'dynamicblock.appendBlock', 'uses' => 'DynamicBlockController@appendBlock']);

    Route::post('dynamicblock/store', ['as' => 'dynamicblock.store', 'uses' => 'DynamicBlockController@store']);

    Route::post('dynamicblock/update', ['as' => 'dynamicblock.update', 'uses' => 'DynamicBlockController@update']);

});