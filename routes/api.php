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


Route::namespace('App\Http\Controllers')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('test', 'Api\FavouriteController@addfavourite');

        Route::prefix('/favourites')->group(function(){
            Route::get('my-favourites', 'Api\FavouriteController@myfavourite');
            Route::post('add-favourites', 'Api\FavouriteController@addfavourite');
        });

        Route::prefix('/products')->group(function(){
            Route::get('promo-section', 'Api\ProductController@promo_section');
            Route::get('package/{id}', 'Api\ProductController@package');
        });


        Route::get('inspect', 'Api\AuthController@inspeksi');
        Route::post('logout', 'Api\AuthController@logout');
    });

    Route::get('users', 'Api\AuthController@index');
    Route::post('login', 'Api\AuthController@login');
    Route::get('products',  'Api\ProductController@index');
});
