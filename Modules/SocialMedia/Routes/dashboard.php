<?php
use Illuminate\Support\Facades\Route;
use Modules\SocialMedia\Http\Controllers\Dashboard\SocialMediaDashboardController;


Route::group(['prefix' => 'socialmedia', 'as' => 'social_media_'], function (){
    Route::get('/', [SocialMediaDashboardController::class, 'index'])->name('index');
    Route::get('/ajax', [SocialMediaDashboardController::class, 'ajax'])->name('ajax');
    Route::get('/create', [SocialMediaDashboardController::class, 'create'])->name('create');
    Route::post('/store', [SocialMediaDashboardController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [SocialMediaDashboardController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [SocialMediaDashboardController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [SocialMediaDashboardController::class, 'destroy'])->name('destroy');


});
