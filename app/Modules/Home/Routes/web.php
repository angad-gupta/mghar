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

Route::get('blog-detail', ['as' => 'blog-detail', 'uses' => 'HomeController@BlogDetail']);