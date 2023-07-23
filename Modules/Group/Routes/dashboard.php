<?php

use Illuminate\Support\Facades\Route;
use Modules\Group\Http\Controllers\Dashboard\GroupController;

Route::group(['prefix' => 'group', 'as' => 'group_'], function (){
    Route::get('/', [GroupController::class, 'index'])->name('index');
    Route::get('/ajax', [GroupController::class, 'ajax'])->name('ajax');
    Route::get('/create', [GroupController::class, 'create'])->name('create');
    Route::post('/store', [GroupController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [GroupController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [GroupController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [GroupController::class, 'destroy'])->name('destroy');


});
