<?php

use Illuminate\Support\Facades\Route;
use Modules\ShopBasket\Http\Controllers\Dashboard\PaymentMethodController;
use Modules\ShopBasket\Http\Controllers\Dashboard\SendingMethodController;

Route::group(['prefix' => 'shop_basket', 'as' => 'shop_basket_'], function (){
    Route::group(['prefix' => 'sending_method', 'as' => 'sending_method_'], function () {
        Route::get('/', [SendingMethodController::class, 'index'])->name('index');
        Route::get('/ajax', [SendingMethodController::class, 'ajax'])->name('ajax');
        Route::get('/create', [SendingMethodController::class, 'create'])->name('create');
        Route::post('/store', [SendingMethodController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SendingMethodController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [SendingMethodController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [SendingMethodController::class, 'destroy'])->name('destroy');

    });
    Route::group(['prefix' => 'payment_method', 'as' => 'payment_method_'], function () {
        Route::get('/', [PaymentMethodController::class, 'index'])->name('index');
        Route::get('/ajax', [PaymentMethodController::class, 'ajax'])->name('ajax');
        Route::get('/create', [PaymentMethodController::class, 'create'])->name('create');
        Route::post('/store', [PaymentMethodController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PaymentMethodController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [PaymentMethodController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [PaymentMethodController::class, 'destroy'])->name('destroy');

    });


});
