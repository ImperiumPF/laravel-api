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

/**
 * User verification route
 */
Route::get('user/verify/{verification_code}', 'AuthController@verifyUser');

/**
 * User password reset route
 */
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');

/**
 * User password reset route
 */
Route::post('password/reset', 'Auth\ResetPasswordController@postReset')->name('password.reset');


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','namespace' => 'Admin'],function(){
    Route::resource('users', 'UsersController');
});

/**
 * FB
 */
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');