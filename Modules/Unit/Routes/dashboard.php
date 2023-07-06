<?php

use Illuminate\Support\Facades\Route;
use Modules\Unit\Http\Controllers\Dashboard\UnitDashboardController;

Route::group(['prefix' => 'unit', 'as' => 'unit_'], function (){
    Route::get('/', [UnitDashboardController::class, 'index'])->name('index');
    Route::get('/ajax', [UnitDashboardController::class, 'ajax'])->name('ajax');
    Route::get('/create', [UnitDashboardController::class, 'create'])->name('create');
    Route::post('/store', [UnitDashboardController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [UnitDashboardController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [UnitDashboardController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [UnitDashboardController::class, 'destroy'])->name('destroy');


});

