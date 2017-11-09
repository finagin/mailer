<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
})->name('user');

Route::group(['prefix' => 'v1', 'as' => 'v1.'], function () {
    Route::group(['prefix' => 'mail', 'as' => 'mail.'], function () {
        Route::group(['middleware' => 'scopes:mail-sand', 'prefix' => 'send', 'as' => 'send'], function () {
            Route::post('', 'Api\v1\MailController@send');
        });
        Route::group(['prefix' => 'platformalp', 'as' => 'platformalp'], function () {
            Route::get('', 'Api\v1\MailController@platformalp');
        });
    });
});
