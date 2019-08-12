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
    return view('loans.list');
});

Route::get('/users', function () {
    return view('users.list');
});

Route::get('/users/edit/{user}', function () {
    return view('users.edit');
});

Route::get('/users/create', function () {
    return view('users.edit');
});


Route::get('/loans', function () {
    return view('loans.list');
});

Route::get('/loans/edit/{user}', function () {
    return view('loans.edit');
});

Route::get('/loans/create', function () {
    return view('loans.edit');
});
