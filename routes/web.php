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

Auth::routes();

Route::get('/', 'HomeController@index')->name('welcome');
//Random Songs
Route::get('/songRandom', 'HomeController@rand')->name('songRandom');
//Role
Route::resource('/role', 'RolesController');
//Category
Route::resource('/category', 'CategoriesController');
//Band
Route::resource('/band-artist', 'BandsController');
//Chord
Route::resource('/chord', 'ChordsController');
//Song
Route::resource('/song', 'SongsController');
//ChordsSong
Route::resource('/chordsSong', 'ChordsSongsController');
//search
Route::get('/searchS', 'SearchController@song');
Route::get('/searchC', 'SearchController@chord');
Route::get('/searchB', 'SearchController@band');
Route::get('/searchW', 'SearchController@welcome');
