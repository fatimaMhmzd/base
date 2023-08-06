<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\Dashboard\ProductDashboardController;
use Modules\Product\Http\Controllers\Dashboard\ProductGroupDashboardController;
use Modules\Product\Http\Controllers\Dashboard\ProductPropertyController;
use Modules\Product\Http\Controllers\Dashboard\SuggestController;

Route::group(['prefix' => 'product', 'as' => 'product_'], function (){
    Route::get('/', [ProductDashboardController::class, 'index'])->name('index');
    Route::get('/ajax', [ProductDashboardController::class, 'ajax'])->name('ajax');
    Route::get('/create', [ProductDashboardController::class, 'create'])->name('create');
    Route::post('/store', [ProductDashboardController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ProductDashboardController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [ProductDashboardController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [ProductDashboardController::class, 'destroy'])->name('destroy');
    Route::get('/deleteImage/{id}', [ProductDashboardController::class, 'deleteImage'])->name('deleteImage');
    Route::get('/comments/{id}', [ProductDashboardController::class, 'showComments'])->name('comments');
    Route::get('/deleteComments/{id}', [ProductDashboardController::class, 'deleteComments'])->name('deleteComments');
    Route::get('/statusComments/{id}/{status}', [ProductDashboardController::class, 'statusComments'])->name('statusComments');
    Route::get('/status/{id}/{status}', [ProductDashboardController::class, 'status'])->name('status');
    Route::group(['prefix' => 'group', 'as' => 'group_'], function (){
        Route::get('/', [ProductGroupDashboardController::class, 'index'])->name('index');
        Route::get('/ajax', [ProductGroupDashboardController::class, 'ajax'])->name('ajax');
        Route::get('/create', [ProductGroupDashboardController::class, 'create'])->name('create');
        Route::post('/store', [ProductGroupDashboardController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductGroupDashboardController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ProductGroupDashboardController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [ProductGroupDashboardController::class, 'destroy'])->name('destroy');
        Route::get('/getSubGroup/{id}', [ProductGroupDashboardController::class, 'getSubGroup'])->name('getSubGroup');


    });
    Route::group(['prefix' => 'property', 'as' => 'property_'], function (){
        Route::get('/', [ProductPropertyController::class, 'index'])->name('index');
        Route::get('/ajax/{id}', [ProductPropertyController::class, 'ajax'])->name('ajax');
        Route::get('/create/{id}', [ProductPropertyController::class, 'create'])->name('create');
        Route::post('/store', [ProductPropertyController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductPropertyController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ProductPropertyController::class, 'update'])->name('update');



    });
    Route::group(['prefix' => 'suggest', 'as' => 'suggest_'], function (){
        Route::get('/', [SuggestController::class, 'index'])->name('index');
        Route::get('/ajax', [SuggestController::class, 'ajax'])->name('ajax');
        Route::get('/create/{id}', [SuggestController::class, 'create'])->name('create');
        Route::post('/store', [SuggestController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SuggestController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [SuggestController::class, 'update'])->name('update');



    });

});
