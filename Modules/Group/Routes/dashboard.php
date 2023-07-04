<?php

use Illuminate\Support\Facades\Route;
use Modules\Group\Http\Controllers\Dashboard\GroupDashboardController;

Route::group(['prefix' => 'group', 'as' => 'group_'], function (){
    Route::get('/', [GroupDashboardController::class, 'index'])->name('index');
    Route::get('/ajax', [GroupDashboardController::class, 'ajax'])->name('ajax');
    Route::get('/create', [GroupDashboardController::class, 'create'])->name('create');
    Route::post('/store', [GroupDashboardController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [GroupDashboardController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [GroupDashboardController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [GroupDashboardController::class, 'destroy'])->name('destroy');


});
