<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;

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
Route::namespace('Test')->middleware('checkAge')->prefix('te')->group(function (){
    Route::get('publish', function (){
        Redis::publish('test_channel', json_encode(['dd'=>'dasd']));
    });
    Route::get('ds', 'IndexController@index')->name('test.ds');
});
Route::namespace('Home')->group(function () {
//    Route::get('upload',function (){
//        return view('pages.upload');
//    })->name('upload');
//    Route::post('upload', 'IndexController@upload')->name('upload');
    Route::get('city', function () {
        $city = \Illuminate\Support\Facades\DB::table('cities')->paginate();
        return view('pages/city', ['city' => $city]);
    });
    Route::get('/', 'IndexController@xx')->name('index');
    //首页
//    Route::get('/', 'IndexController@index')->name('index');
    //搜索页面
    Route::get('search', 'IndexController@search')->name('search');
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
    Route::middleware('auth:web')->group(function () {
        Route::get('company/create', 'CompanyController@create')->name('company.create');
        Route::post('company/store', 'CompanyController@store')->name('company.store');
        Route::put('company/update/{companyInfo}', 'CompanyController@update')->name('company.update');
        Route::get('personal/index', 'PersonalController@index')->name('personal.index');
        Route::put('personal/edit', 'PersonalController@edit')->name('personal.edit');
        Route::get('company/edit', 'CompanyController@edit')->name('company.edit');
        //专线相关
        Route::get('logistic/create', 'LogisticController@create')->name('logistic.create');
        Route::post('logistic/store', 'LogisticController@store')->name('logistic.store');
        Route::delete('logistic/{logistics_line}', 'LogisticController@destroy')->name('logistic.destroy');
        Route::get('logistic/edit/{logistics_line}', 'LogisticController@edit')->name('logistic.edit');
        Route::put('logistic/update/{logistics_line}', 'LogisticController@update')->name('logistic.update');
        Route::get('logistics', 'LogisticController@index')->name('logistic.index');
    });

});

//Route::get('/', "IndexController@index");
