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
use App\Http\Middleware\LogMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('study')->group(function() {

    Route::get('/', 'StudyController@index');

    Route::get('directive', 'StudyController@directive');

    Route::prefix('routes')->group(function() {

        Route::get(
            'parameters/{require}/{option?}/{regexp?}/{global_regexp?}/{variable?}',
            'RoutesController@parameters'
        )->where([
            'regexp' => 'A[0-9]{3,5}',
            'variable' => '.*',
        ]);

        Route::namespace('Biglogic')->group(function () {

            Route::get('feature_a/logic', 'FeatureAController@logic');

            Route::get('feature_b/logic', 'FeatureBController@logic');
        });

        Route::view('pass_action', 'routes.pass_action', ['param' => 'Laravel']);

        Route::redirect('request_redirect', 'redirect', 301);

        Route::view('redirect', 'routes.redirect');

        Route::fallback(function() {
            return view('routes.fallback', ['from' => 'routes']);
        });
    });

    Route::prefix('control')->group(function() {
    Route::namespace('Control')->group(function () {

        Route::prefix('response')->group(function() {

            Route::view('/', 'control.response.index');

            Route::get('plain', 'ResponseController@plain');
            Route::get('json', 'ResponseController@json');
            Route::get('download', 'ResponseController@download');
            Route::get('file', 'ResponseController@file');
            Route::get('request_redirect/{type}', 'ResponseController@request_redirect');
            Route::get('redirect', 'ResponseController@redirect')
                ->name('redirect');
        });

        Route::prefix('request')->group(function() {

            Route::match(['get', 'post'], '/', 'RequestController@index');
        });
    });
    });

    Route::prefix('middleware')->group(function() {

        Route::get('log', 'MiddlewareController@log')
            ->middleware(LogMiddleware::class);
    });

    Route::fallback(function() {
        return view('routes.fallback', ['from' => 'study']);
    });
});
