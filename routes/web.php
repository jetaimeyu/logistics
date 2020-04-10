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
    Route::get('city',function (){
       $city = \Illuminate\Support\Facades\DB::table('cities')->paginate();
       return view('pages/city', ['city'=>$city]);
    });
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
    Route::middleware('auth:web')->group(function (){
        Route::get('company/create', 'CompanyController@create')->name('company.create');
        Route::post('company/store', 'CompanyController@store')->name('company.store');
    });

});

//Route::get('/signup', )
