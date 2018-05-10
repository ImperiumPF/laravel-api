<?php

use Illuminate\Http\Request;

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


/**
 * Prefix /v1/
 */
Route::group(['domain' => env('APP_URL_API'), 'prefix' => 'v1'], function() {

    /**
     * /v1/register
     * Create an account
     */
    Route::post('register', 'AuthController@register');

    /**
     * /v1/login
     * Login to an account
     */
    Route::post('login', 'AuthController@login');

    /**
     * /v1/recover
     * Recover an account
     */
    Route::post('recover', 'AuthController@recover');

    /**
     * Routes with authentication needed
     */
    Route::group(['middleware' => ['jwt.auth']], function() {
        /**
         * /v1/logout
         * Logout from an account
         */
        Route::get('logout', 'AuthController@logout');

        /**
         * List all categories
         */
        Route::get('categories', 'Admin\CategoriesController@index');

        /**
         * List a category
         */
        Route::get('categories/{id}', 'Admin\CategoriesController@show');

        /**
         * Create a category
         */
        Route::post('categories', 'Admin\CategoriesController@store');

        /**
         * Delete a category
         */
        Route::delete('categories/{id}', 'Admin\CategoriesController@destroy');
    });


    /**
     * Shop Routes
     * /v1/shop/
     */
    Route::group(array('prefix' => 'shop'), function() {
        //
    });
});
