<?php
use Illuminate\Support\Facades\Route;

use Modules\SocialMedia\Http\Controllers\Dashboard\AdminSocialMediaController;


Route::group(['prefix' => 'socialmedia', 'as' => 'social_media_'], function (){
    Route::get('/', [AdminSocialMediaController::class, 'index'])->name('index');
    Route::get('/ajax', [AdminSocialMediaController::class, 'ajax'])->name('ajax');
    Route::get('/create', [AdminSocialMediaController::class, 'create'])->name('create');
    Route::post('/store', [AdminSocialMediaController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AdminSocialMediaController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [AdminSocialMediaController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [AdminSocialMediaController::class, 'destroy'])->name('destroy');


});
