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
use Modules\ContactUs\Http\Controllers\ContactUsController;

Route::group(['prefix' => 'contactus', 'as' => 'contactus_'], function (){
    Route::get('/', [ContactUsController::class, 'index'])->name('index');
    Route::get('/ajax', [ContactUsController::class, 'ajax'])->name('ajax');
    Route::get('/create', [ContactUsController::class, 'create'])->name('create');
    Route::post('/store', [ContactUsController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ContactUsController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [ContactUsController::class, 'update'])->name('update');
    Route::get('/destroy/{id}', [ContactUsController::class, 'destroy'])->name('destroy');


});


