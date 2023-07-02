<?php


use Illuminate\Support\Facades\Route;
use Modules\Page\Http\Controllers\Dashboard\AdminPageController;

Route::prefix('Page')->group(function () {
//    Route::get('/', [AdminPageController::class, 'test'])->name('test');


    Route::get('/add', [AdminPageController::class, 'add'])->name('add');
    Route::get('/list', [AdminPageController::class, 'list'])->name('list');
    Route::get('/update', [AdminPageController::class, 'update'])->name('update');
    /*  Route::post('/storeUpdate', [AdminPageController::class, 'storeUpdate'])->name('store_update');
      Route::get('/test', [AdminPageController::class, 'ajax'])->name('ajax');
      Route::get('/delete/{id}', [AdminPageController::class, 'delete'])->name('delete');
      Route::get('/update/{id}', [AdminPageController::class, 'update'])->name('update');*/

});
