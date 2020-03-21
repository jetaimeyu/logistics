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
Route::prefix('v1')
    ->namespace('Api')
    ->middleware('throttle:1,1')
    ->name('api.v1.')
    ->group(function () {
        Route::middleware('throttle:' . config('api.rate_limit.sign'))->group(function () {
            Route::post('verificationCodes', 'VerificationCodeController@store')
                ->name('verificationCodes.store');
            Route::post('users', 'UsersController@store')->name('users.store');
        });

        Route::middleware('throttle:' . config('api.rate_limit.access'))->group(function () {

        });

    });
