<?php

use Illuminate\Support\Facades\Route;
use Modules\Size\Http\Controllers\Dashboard\SizeController;

Route::group(['prefix' => 'size', 'as' => 'size_'], function (){
    Route::get('/', [SizeController::class, 'index'])->name('index');
    Route::get('/ajax', [SizeController::class, 'ajax'])->name('ajax');
    Route::get('/create', [SizeController::class, 'create'])->name('create');
    Route::post('/store', [SizeController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [SizeController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [SizeController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [SizeController::class, 'destroy'])->name('destroy');
    Route::get('/getSizeByUnit', [SizeController::class, 'getSizeByUnit'])->name('getSizeByUnit');


});

