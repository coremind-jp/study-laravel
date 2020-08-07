<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('study')->group(function () {
    Route::prefix('broadcast')->group(function () {
        Route::post('public/post', 'BroadcastController@postPublic');
    });
});


Route::middleware('auth:api')->group(function () {
    Route::prefix('study')->group(function () {
        Route::prefix('broadcast')->group(function () {
            Route::post('private/post', 'BroadcastController@postPrivate');
        });
    });
});
