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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1','middleware' => ['cors']], function () {

    Route::post('/login', 'Auth\ApiAuthController@login')->name('login.api');
    Route::post('/register','Auth\ApiAuthController@register')->name('register.api');
    Route::post('/logout', 'Auth\ApiAuthController@logout')->name('logout.api');

});

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {

    Route::resource('/categories','Api\CategoriesController');
    Route::resource('products','Api\ProductsController');
    Route::resource('suppliers','Api\SuppliersController');
    Route::resource('buyers','Api\BuyersController');
});
