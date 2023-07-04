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
use Modules\Setting\Http\Controllers\Dashboard\AdminSettingController;


Route::group(['prefix' => 'setting', 'as' => 'setting_'], function (){
    Route::get('/', [AdminSettingController::class, 'index'])->name('index');
    Route::get('/ajax', [AdminSettingController::class, 'ajax'])->name('ajax');
    Route::get('/create', [AdminSettingController::class, 'create'])->name('create');
    Route::post('/store', [AdminSettingController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AdminSettingController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [AdminSettingController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [AdminSettingController::class, 'destroy'])->name('destroy');


});

