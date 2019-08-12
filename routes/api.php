<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api'], function () {


    Route::match(['get', 'post'],'/users/search', 'UsersController@index');
    Route::match(['put', 'patch','post'], '/users/{user}', 'UsersController@update');
    Route::post('users', 'UsersController@store');
    Route::delete('/users/{user}', 'UsersController@destroy');
    Route::get('users/{user}', 'UsersController@show');


    Route::match(['get', 'post'],'/loans/search', 'LoansController@index');
    Route::match(['put', 'patch','post'], '/loans/{loan}', 'LoansController@update');
    Route::post('loans', 'LoansController@store');
    Route::delete('/loans/{loan}', 'LoansController@destroy');
    Route::get('loans/{loan}', 'LoansController@show');



});
