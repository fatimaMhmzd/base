<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\Dashboard\ProductDashboardController;
use Modules\Product\Http\Controllers\Dashboard\ProductGroupDashboardController;

Route::group(['prefix' => 'product', 'as' => 'product_'], function (){
    Route::get('/', [ProductDashboardController::class, 'index'])->name('index');
    Route::get('/ajax', [ProductDashboardController::class, 'ajax'])->name('ajax');
    Route::get('/create', [ProductDashboardController::class, 'create'])->name('create');
    Route::post('/store', [ProductDashboardController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ProductDashboardController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [ProductDashboardController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [ProductDashboardController::class, 'destroy'])->name('destroy');
    Route::group(['prefix' => 'group', 'as' => 'group_'], function (){
        Route::get('/', [ProductGroupDashboardController::class, 'index'])->name('index');
        Route::get('/ajax', [ProductGroupDashboardController::class, 'ajax'])->name('ajax');
        Route::get('/create', [ProductGroupDashboardController::class, 'create'])->name('create');
        Route::post('/store', [ProductGroupDashboardController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductGroupDashboardController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ProductGroupDashboardController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [ProductGroupDashboardController::class, 'destroy'])->name('destroy');
        Route::get('/getSubGroup/{id}', [ProductGroupDashboardController::class, 'getSubGroup'])->name('getSubGroup');


    });

});
