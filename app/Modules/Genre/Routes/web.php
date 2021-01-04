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
    
       
    Route::get('genre', ['as' => 'genre.index', 'uses' => 'GenreController@index']);

    Route::get('genre/create', ['as' => 'genre.create', 'uses' => 'GenreController@create']);
    Route::post('genre/store', ['as' => 'genre.store', 'uses' => 'GenreController@store']);

    Route::get('genre/edit/{id}', ['as' => 'genre.edit', 'uses' => 'GenreController@edit'])->where('id','[0-9]+');
    Route::put('genre/update/{id}', ['as' => 'genre.update', 'uses' => 'GenreController@update'])->where('id','[0-9]+');

    Route::get('genre/delete/{id}', ['as' => 'genre.delete', 'uses' => 'GenreController@destroy'])->where('id','[0-9]+');
        
         
});