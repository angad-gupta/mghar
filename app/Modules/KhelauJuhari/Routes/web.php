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
    
       
    Route::get('khelaujuhari', ['as' => 'khelaujuhari.index', 'uses' => 'KhelauJuhariController@index']);

    Route::get('khelaujuhari/create', ['as' => 'khelaujuhari.create', 'uses' => 'KhelauJuhariController@create']);
    Route::post('khelaujuhari/store', ['as' => 'khelaujuhari.store', 'uses' => 'KhelauJuhariController@store']);

    Route::get('khelaujuhari/edit/{id}', ['as' => 'khelaujuhari.edit', 'uses' => 'KhelauJuhariController@edit'])->where('id','[0-9]+');
    Route::put('khelaujuhari/update/{id}', ['as' => 'khelaujuhari.update', 'uses' => 'KhelauJuhariController@update'])->where('id','[0-9]+');

    Route::get('khelaujuhari/delete/{id}', ['as' => 'khelaujuhari.delete', 'uses' => 'KhelauJuhariController@destroy'])->where('id','[0-9]+');
        
         
});