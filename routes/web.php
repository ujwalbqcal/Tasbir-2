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

Route::get('/','Albumscontroller@index');
/*
Route::get('/albums','Albumscontroller@index');
*/
Route::get('/albums','Albumscontroller@create');
Route::get('/albums/create','Albumscontroller@create');
Route::get('/albums/{id}','Albumscontroller@show');
Route::post('/albums/store','Albumscontroller@store');

Route::get('/photos/create/{id}','photocontroller@create');
Route::post('/photos/store','photocontroller@store');
Route::get('/photos/{id}','photocontroller@show');
Route::delete('/photos/{id}','photocontroller@destroy');


