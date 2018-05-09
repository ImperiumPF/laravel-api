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
 * Set the localization
 */
Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->where('locale','pt|en');

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

//Auth::routes();
// Authentication Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');

//Route::group(['prefix' => 'backend','middleware' => ['role:Administrador']],function(){
Route::group(['prefix' => 'backend','namespace' => 'Admin'],function(){
    Route::resource('users', 'UsersController')->middleware('role:Administrador');
    Route::resource('roles','RolesController');
});

Route::group(['prefix' => 'backend','namespace' => 'Admin'],function(){
    Route::resource('categories','CategoriesController');
});

/**
 * Socialite
 */
Route::get('/login/{social}','Auth\LoginController@socialLogin')
        ->where('social','facebook|google');

Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')
        ->where('social','facebook|google');

Route::get('/backend', 'HomeController@admin')->name('index');
