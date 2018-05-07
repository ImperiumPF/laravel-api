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
Route::get('locale/{locale}', function ($locale) {
    \Session::put('locale', $locale);
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::group(['prefix' => 'backend','middleware' => ['role:Administrador']],function(){
Route::group(['prefix' => 'backend','namespace' => 'Admin'],function(){
    Route::resource('users', 'UsersController');
    Route::resource('roles','RolesController');
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

//});