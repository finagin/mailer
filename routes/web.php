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

Route::group(['prefix' => 'register'], function () {
    Route::get('', function () {
        return redirect(route('login'), 302);
    })->name('register');
    Route::post('', function () {
        return redirect(route('login'), 302);
    });
});

Route::get('/home', 'HomeController@index')->name('home');
