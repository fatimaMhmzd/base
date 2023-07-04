<?php
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\Dashboard\AdminUserController;


Route::group(['prefix' => 'user', 'as' => 'user_'], function (){
    Route::get('/', [AdminUserController::class, 'index'])->name('index');
    Route::get('/ajax', [AdminUserController::class, 'ajax'])->name('ajax');
    Route::get('/create', [AdminUserController::class, 'create'])->name('create');
    Route::post('/store', [AdminUserController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AdminUserController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [AdminUserController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [AdminUserController::class, 'destroy'])->name('destroy');


});
