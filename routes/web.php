<?php

use Illuminate\Support\Facades\Auth;
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
use App\Review;

Route::prefix('study')->group(function () {
    Route::get('/', function () {
        return 'こんにちわ、世界！';
    });


    Route::prefix('directive')->group(function () {
        Route::get('/', 'DirectiveController@index');
    });


    Route::prefix('signed_url')->group(function () {
        Route::get('/', 'SignedUrlController@index');
        Route::get('verify', 'SignedUrlController@verify')->name('verify');
    });


    Route::prefix('routes')->group(function () {
        Route::view('view', 'routes.view', ['param' => 'Laravel']);


        Route::get(
            'parameters/{require}/{option?}/{regexp?}/{global_regexp?}/{variable?}',
            'RoutesController@parameters'
        )->where([
            'regexp' => 'A[0-9]{3,5}',
            'variable' => '.*',
        ]);


        Route::prefix('redirect')->group(function () {
            Route::redirect('from', 'routes.redirect.to', 301);
            Route::view('to', 'routes.redirect.to');
        });


        Route::prefix('resource')->group(function () {
            Route::resource('books', 'ResourceController');
        });


        Route::namespace('Biglogic')->group(function () {
            Route::get('feature_a/logic', 'FeatureAController@logic');
            Route::get('feature_b/logic', 'FeatureBController@logic');
        });


        Route::fallback(function () {
            return view('routes.fallback', ['from' => 'routes']);
        });
    });


    Route::prefix('control')->namespace('Control')->group(function () {
        Route::prefix('response')->group(function () {
            Route::view('/', 'control.response.index');
            Route::get('plain', 'ResponseController@plain');
            Route::get('json', 'ResponseController@json');
            Route::get('download', 'ResponseController@download');
            Route::get('file', 'ResponseController@file');
            Route::get('request_redirect/{type}', 'ResponseController@request_redirect');
            Route::get('redirect', 'ResponseController@redirect')->name('redirect');
        });


        Route::prefix('request')->group(function () {
            Route::get('/', 'RequestController@create');
            Route::post('/', 'RequestController@post');
        });
    });


    Route::prefix('middleware')->group(function () {
        Route::get('log', 'MiddlewareController@log')->middleware(LogMiddleware::class);
    });


    Route::prefix('stateful')->group(function () {
        Route::get('/', 'StatefulController@index')->name('stateful_index');
        Route::get('write_cookie/{type?}', 'StatefulController@write_cookie');
        Route::get('clear_cookie/{type?}', 'StatefulController@clear_cookie');
        Route::get('write_session', 'StatefulController@write_session');
        Route::get('clear_session', 'StatefulController@clear_session');
        Route::get('flash', 'StatefulController@flash');
    });


    Route::prefix('eloquent')->group(function () {
        Route::get('/', 'EloquentController@index');
        Route::get('relation', 'EloquentController@relation');
    });


    Route::prefix('custom_validation')->group(function () {
        Route::get('/', 'CustomValidationController@index');
        Route::post('rule', 'CustomValidationController@rule');
        Route::post('extend', 'CustomValidationController@extend');
        Route::post('closure', 'CustomValidationController@closure');
    });


    Route::prefix('auth')->group(function () {
        Auth::routes(['verify' => true]);
        Route::get('oauth/{provider}', 'AuthController@oauth');
        Route::get('oauth/{provider}/callback', 'AuthController@oauthCallback');

        Route::middleware(['auth', 'verified'])->group(function () {
            Route::get('home', 'AuthController@home');
            Route::get('profile', 'AuthController@profile');
            Route::get('pay', 'AuthController@pay')->middleware('password.confirm');
            Route::get('api_token/update', 'AuthController@updateTokne');
            Route::get('send_html', 'MailController@html');
            Route::get('send_markdown', 'MailController@markdown');

            Route::get('books/{book?}', 'PolicyController@show')->name('books');
            Route::post('books', 'PolicyController@post');
            Route::delete('books/{book}', 'PolicyController@delete');
            Route::patch('books/{book}', 'PolicyController@patch')
                ->middleware('can:update,book');
        });
    });


    Route::prefix('authorization')->group(function () {
        Route::get('/', 'AuthorizationController@index');
        Route::get('admin', 'AuthorizationController@doSomthingAsAdmin');
        Route::get('chief', 'AuthorizationController@doSomthingAsChief');
        Route::get('user', 'AuthorizationController@doSomthingAsUser');
    });


    Route::prefix('event')->group(function () {
        Route::get('global', 'EventController@global');
        Route::get('scoped', 'EventController@scoped');
    });


    Route::prefix('broadcast')->group(function () {
        Route::get('public', 'BroadcastController@public');
        Route::get('private/{id?}', 'BroadcastController@private')
            ->middleware(['auth', 'verified']);
    });

    Route::prefix('notification')->group(function () {
        Route::get('/', 'NotificationController@index');
        Route::post('notify', 'NotificationController@notify');
        Route::get('read/{id}', 'NotificationController@read');
    });

    Route::fallback(function () {
        return view('routes.fallback', ['from' => 'study']);
    });
});
