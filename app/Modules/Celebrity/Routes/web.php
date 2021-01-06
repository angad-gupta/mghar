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
    
       
    Route::get('celebrity', ['as' => 'celebrity.index', 'uses' => 'CelebrityController@index']);

    Route::get('celebrity/create', ['as' => 'celebrity.create', 'uses' => 'CelebrityController@create']);
    Route::post('celebrity/store', ['as' => 'celebrity.store', 'uses' => 'CelebrityController@store']);

    Route::get('celebrity/edit/{id}', ['as' => 'celebrity.edit', 'uses' => 'CelebrityController@edit'])->where('id','[0-9]+');
    Route::put('celebrity/update/{id}', ['as' => 'celebrity.update', 'uses' => 'CelebrityController@update'])->where('id','[0-9]+');

    Route::get('celebrity/delete/{id}', ['as' => 'celebrity.delete', 'uses' => 'CelebrityController@destroy'])->where('id','[0-9]+');
        
    Route::get('celebrity/appendAward', ['as' => 'celebrity.appendAward', 'uses' => 'CelebrityController@appendAward']);    

});