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

use Illuminate\Support\Facades\Route;
use Modules\Setting\Http\Controllers\Dashboard\SettingController;

Route::group(['prefix' => 'setting', 'as' => 'setting_'], function (){
    Route::get('/', [SettingController::class, 'index'])->name('index');
    Route::get('/ajax', [SettingController::class, 'ajax'])->name('ajax');
    Route::get('/create', [SettingController::class, 'create'])->name('create');
    Route::post('/store', [SettingController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [SettingController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [SettingController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [SettingController::class, 'destroy'])->name('destroy');
});

