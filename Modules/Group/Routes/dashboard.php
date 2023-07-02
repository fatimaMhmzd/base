<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user', 'as' => 'user_'], function (){
    Route::post('/singUp', [AuthenticationController::class, 'singUp'])->name('singUp');
    Route::post('/singIn', [AuthenticationController::class, 'singIn'])->name('singUp');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
