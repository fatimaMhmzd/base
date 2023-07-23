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

//Route::prefix('product')->group(function() {
//    Route::get('/', 'ProductController@index');
//});

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\ProductController;
use Modules\Product\Http\Controllers\WishListController;

Route::group(['prefix' => 'shop', 'as' => 'shop_'], function () {
    Route::get('/storePage/{slug?}', [ProductController::class, 'index'])->name('storePageClient');
    Route::get('/productDetail/{slug}', [ProductController::class, 'productDetail'])->name('productDetail');
    Route::get('/cartPage', [ProductController::class, 'cart'])->name('cartPageClient');
    Route::get('/checkoutPage', [ProductController::class, 'checkout'])->name('checkoutPageClient');
});
Route::group(['prefix' => 'product', 'as' => 'product_'], function () {
    Route::group(['prefix' => 'wishlist', 'as' => 'wishList_'], function () {
        Route::get('/', [WishListController::class, 'index'])->name('index');
        Route::get('/ajax', [WishListController::class, 'ajax'])->name('ajax');
        Route::get('/create', [WishListController::class, 'create'])->name('create');
        Route::get('/store', [WishListController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [WishListController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [WishListController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [WishListController::class, 'destroy'])->name('destroy');

    });
});
