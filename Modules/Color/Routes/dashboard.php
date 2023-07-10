<?php

use Illuminate\Support\Facades\Route;
use Modules\Color\Http\Controllers\Dashboard\ColorController;


Route::group(['prefix' => 'color', 'as' => 'color_'], function (){
    Route::get('/', [ColorController::class, 'index'])->name('index');
    Route::get('/ajax', [ColorController::class, 'ajax'])->name('ajax');
    Route::get('/create', [ColorController::class, 'create'])->name('create');
    Route::post('/store', [ColorController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ColorController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [ColorController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [ColorController::class, 'destroy'])->name('destroy');


});

