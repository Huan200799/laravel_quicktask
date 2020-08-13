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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('layouts.app');
});
Route::get('signin', 'UserController@getSignin');
Route::post('signin', 'UserController@postSignin');


Route::group(['prefix' => 'login','middleware'=>'CheckLogedIn'], function() {
    Route::get('/', 'UserController@getLogin');
    Route::post('/', 'UserController@postLogin');
});

Route::get('logout', 'UserController@getLogout');

Route::group(['prefix' => 'admin','middleware'=>'CheckLogedOut'], function() {
    Route::get('listaccout', 'UserController@getAccout');
    Route::get('editaccout/{id}', 'UserController@getEditAccout');
    Route::post('editaccout/{id}', 'UserController@postEditAccout');
    Route::get('delaccout/{id}', 'UserController@getDelAccout');
});
