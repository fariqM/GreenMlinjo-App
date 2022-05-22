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
    Route::get('test', 'Api\ProductController@promo_section');

    Route::prefix('/products')->group(function () {
        Route::get('promo-section', 'Api\ProductController@promo_section');
        Route::get('package/{id}', 'Api\ProductController@package');
        Route::get('product-terlaris/{market_id}', 'Api\ProductController@produk_terlaris');
    });

    Route::get("markets-index", 'Api\MarketController@index');

    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('/v1')->group(function () {
            Route::post('test', 'Api\OrderController@makeOrder');

            Route::prefix('favourites')->group(function () {
                Route::get('my-favourites', 'Api\FavouriteController@myfavourite');
                Route::get('favourite-products', 'Api\FavouriteController@favouriteProducts');
                Route::post('add-favourites', 'Api\FavouriteController@addfavourite');
                Route::delete('remove-favourite/{favourite:id}', 'Api\FavouriteController@removeFavourite');
            });

            Route::prefix('carts')->group(function(){
                Route::get('my-carts', 'Api\CartController@mycarts');
                Route::get('cart-products', 'Api\CartController@cartProducts');
                Route::post('add-carts', 'Api\CartController@addcart');
                Route::delete('remove-carts', 'Api\CartController@removeCart');
                Route::post('adjust-qty/{cart:id}', 'Api\CartController@addjustCart');
            });

            Route::prefix('products')->group(function () {
                Route::get('promo-section', 'Api\ProductController@promo_section');
                Route::get('package/{id}', 'Api\ProductController@package');
                Route::get('sedekah-product', 'Api\ProductController@paket_sedekah');
                Route::get('product-terlaris/{market_id}', 'Api\ProductController@produk_terlaris');
            });

            Route::prefix('orders')->group(function(){
                Route::get('index', 'Api\OrderController@index');
                Route::post('make-order', 'Api\OrderController@makeOrder');
                Route::get('get-last-order/{id}', 'Api\OrderController@getOrder');
                Route::put('confirm/{order:id}', 'Api\OrderController@confirmOrder');
            });

            Route::get('get-my-address', 'Api\AddressController@index');
            Route::post('create-new-address', 'Api\AddressController@store');
            Route::put('choose-address/{address:id}', 'Api\AddressController@chooseAddress');
            Route::get('get-choosen-address', 'Api\AddressController@getChoosenAddress');

            Route::prefix('blc')->group(function(){
                Route::get('get-balance', "Api\BalanceController@getBalance");
                Route::post('topup', "Api\BalanceController@topup");
                Route::post('purchase', 'Api\BalanceController@purchase');
            });

            Route::prefix('transaction')->group(function(){
                Route::post('make', 'Api\TransactionController@make');
            });

            Route::get('get-vouchers', 'Api\OrderController@voucherIndex');

            Route::get('get-infaq', 'Api\InfaqController@infaq');
            Route::put('add-infaq', 'Api\InfaqController@addInfaq');

            Route::get('inspect', 'Api\AuthController@inspeksi');
            Route::post('logout', 'Api\AuthController@logout');
            
        });
    });

    Route::get('users', 'Api\AuthController@index');
    Route::post('login', 'Api\AuthController@login');
    Route::post('register', 'Api\AuthController@register');
    Route::get('products',  'Api\ProductController@index');
});
