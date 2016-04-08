<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes...

Route::get('login','AuthController@getLogin');
//Route::get('login','AuthController@postlogin');
Route::get('logout','AuthController@getLogout');
Route::get('success','AuthController@index')->name('success');

// Registration routes...
Route::get('register', 'AuthController@getRegister')->name('register');
Route::post('register', 'AuthController@postRegister')->name('register');

