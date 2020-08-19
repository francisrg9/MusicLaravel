<?php

use Illuminate\Support\Facades\Route;

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
//Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/songs', 'SongsController@Index')->name('Songs');
Route::get('/genres', 'GenresController@Index')->name('Genres info');


Route::get('/admin/songs', 'SongsController@IndexAdmin');
Route::get('/admin/songs/create','SongsController@Create');
Route::post('/admin/songs/create','SongsController@Song');
Route::get('/admin/songs/delete/{id}','SongsController@Delete');
Route::delete('/admin/songs/delete', 'SongsController@Remove');
Route::get('/admin/songs/edit/{id}','SongsController@Edit');
Route::post('/admin/songs/edit', 'SongsController@Update');
Route::get('/admin/songs/{id}','SongsController@Show');

Route::get('/admin/genres', 'GenresController@IndexAdmin');
Route::get('/admin/genres/create','GenresController@Create');
Route::post('/admin/genres/create','GenresController@Genre');
Route::get('/admin/genres/delete/{id}','GenresController@Delete');
Route::delete('/admin/genres/delete', 'GenresController@Remove');
Route::get('/admin/genres/edit/{id}','GenresController@Edit');
Route::post('/admin/genres/edit', 'GenresController@Update');
Route::get('/admin/genres/{id}','GenresController@Show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
