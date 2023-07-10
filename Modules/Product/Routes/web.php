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
Route::group(['prefix' => 'shop', 'as' => 'shop_'], function () {
    Route::get('/storePage', [ProductController::class, 'index'])->name('storePageClient');
    Route::get('/productDetail/{slug}', [ProductController::class, 'productDetail'])->name('productDetail');
    Route::get('/cartPage', [ProductController::class, 'cart'])->name('cartPageClient');
    Route::get('/checkoutPage', [ProductController::class, 'checkout'])->name('checkoutPageClient');
});
