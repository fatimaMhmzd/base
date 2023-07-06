<?php


use Illuminate\Support\Facades\Route;
use Modules\Page\Http\Controllers\Dashboard\AdminPageController;

Route::group(['prefix' => 'page', 'as' => 'page_'], function (){
    Route::get('/', [AdminPageController::class, 'index'])->name('index');
    Route::get('/ajax', [AdminPageController::class, 'ajax'])->name('ajax');
    Route::get('/create', [AdminPageController::class, 'create'])->name('create');
    Route::post('/store', [AdminPageController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AdminPageController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [AdminPageController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [AdminPageController::class, 'destroy'])->name('destroy');


});

