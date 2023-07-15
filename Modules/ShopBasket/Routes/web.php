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


use Illuminate\Support\Facades\Route;
use Modules\ShopBasket\Http\Controllers\OrderController;
use Modules\ShopBasket\Http\Controllers\ShopBasketController;

Route::group(['prefix' => 'shopbasket', 'as' => 'shopbasket_'], function () {

    Route::group(['prefix' => 'order', 'as' => 'order_'], function () {
        Route::get('/store/{id}/{propertyId?}/{count?}', [OrderController::class, 'store'])->name('store');


    });
});
