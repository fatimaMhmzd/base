<?php

use Illuminate\Support\Facades\Route;
use Modules\Slider\Http\Controllers\Dashboard\SliderDashboardController;

Route::group(['prefix' => 'slider', 'as' => 'slider_'], function (){
    Route::get('/', [SliderDashboardController::class, 'index'])->name('index');
    Route::get('/ajax', [SliderDashboardController::class, 'ajax'])->name('ajax');
    Route::get('/create', [SliderDashboardController::class, 'create'])->name('create');
    Route::post('/store', [SliderDashboardController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [SliderDashboardController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [SliderDashboardController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [SliderDashboardController::class, 'destroy'])->name('destroy');


});
