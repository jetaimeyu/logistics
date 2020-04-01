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
Route::namespace('Home')->group(function (){
    //首页
    Route::get('/', 'IndexController@index');
    //登录页面
    //注册页面
    Route::get('signup', 'IndexController@signup');

    //登录相关
    Route::get('login', 'SessionsController@create')->name('login');
    Route::post('login', 'SessionsController@store')->name('login');
    Route::delete('login', 'SessionsController@destroy')->name('logout');
    Route::resource('users', 'UsersController');
    Route::get('captcha/{temp}', 'UsersController@captcha')->name('captcha');
    Route::get('verification', 'UsersController@getVerificationCode')->name('getVerificationCode');

    Route::get('password/reset', 'UsersController@reset')->name('password.reset');
    Route::post('password/resetPassword', 'UsersController@resetPassword')->name('password.resetPassword');

});

//Route::get('/signup', )
