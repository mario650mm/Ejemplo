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

Route::get('/home', 'HomeController@index')->name('home');


//Route::group(['middleware' => ['auth','is_admin']],function(){
Route::group(['middleware' => ['auth']],function(){
	Route::get('/users','UsersController@index');
	Route::get('/users/create','UsersController@create');
	Route::post('/users/store','UsersController@store');
	Route::get('/users/show/{id}','UsersController@show');
	Route::get('/users/edit/{id}','UsersController@edit');
	Route::post('/users/update/{id}','UsersController@update');
	Route::post('/users/delete/{id}','UsersController@destroy');
});

Route::group(['middleware' => ['auth']],function() {
    Route::post('/changeLenguage', 'LenguageController@changeLenguage');
});