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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin\\'], function () {
    Route::get('/', 'AuthController@getLogin');
    Route::post('/login', 'AuthController@postLogin')->name('admin.login');
    Route::get('/logout', 'AuthController@getLogout')->name('admin.logout');

    Route::get('/home', 'HomeController@index')->name('admin.home');
    
    
    Route::get('/user', 'UserController@index');
    Route::group(['prefix' => 'user'], function() {
	    Route::get('index', 'UserController@index');
	    Route::get('create', 'UserController@create');
    });
    
});

