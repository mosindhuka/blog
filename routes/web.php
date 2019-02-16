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

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'LoginController@index');

Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

Route::get('post', 'PostController@index');

Route::get('post/add', 'PostController@add');
Route::get('post/edit/{id}', 'PostController@edit')->middleware('CheckAccess');

Route::post('post/store', 'PostController@store');
Route::post('post/update', 'PostController@update')->middleware('CheckAccess');

