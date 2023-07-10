<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\AuthenticationController;

Route::group(['prefix' => 'user', 'as' => 'user_'], function (){
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/singUp', [AuthenticationController::class, 'singUp'])->name('singUp');
    Route::post('/singIn', [AuthenticationController::class, 'singIn'])->name('singIn');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/forgetPassword', [LoginController::class, 'forgetPassword'])->name('forgetPassword');
});
