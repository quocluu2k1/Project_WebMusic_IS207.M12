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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@change_direction')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout');
Route::get('/mymusic', 'MyMusicController@index')->name('mymusic');
Route::get('/genre', 'GenreController@index');
Route::get('/rank', 'RankController@index');
Route::get('/search', 'SearchController@search');
Route::get('/searchSinger', 'SearchController@searchSinger');
Route::get('/searchGenre', 'SearchController@searchGenre');
Route::get('/playMyMusic', 'MyMusicController@PlayMusic');

