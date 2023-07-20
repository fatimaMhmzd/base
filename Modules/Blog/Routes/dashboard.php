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
use Modules\Blog\Http\Controllers\Dashboard\AdminBlogController;
use Modules\Blog\Http\Controllers\Dashboard\BlogController;
use Modules\Blog\Http\Controllers\Dashboard\BlogGroupController;
use Modules\Blog\Http\Controllers\Dashboard\LableController;

Route::group(['prefix' => 'blog', 'as' => 'blog_'], function (){
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/ajax', [BlogController::class, 'ajax'])->name('ajax');
    Route::get('/create', [BlogController::class, 'create'])->name('create');
    Route::post('/store', [BlogController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [BlogController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [BlogController::class, 'destroy'])->name('destroy');
    Route::group(['prefix' => 'group', 'as' => 'group_'], function (){
        Route::get('/', [BlogGroupController::class, 'index'])->name('index');
        Route::get('/ajax', [BlogGroupController::class, 'ajax'])->name('ajax');
        Route::get('/create', [BlogGroupController::class, 'create'])->name('create');
        Route::post('/store', [BlogGroupController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BlogGroupController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [BlogGroupController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [BlogGroupController::class, 'destroy'])->name('destroy');
        Route::get('/getSubGroup/{id}', [BlogGroupController::class, 'getSubGroup'])->name('getSubGroup');


    });
    Route::group(['prefix' => 'lable', 'as' => 'lable_'], function (){
        Route::get('/', [LableController::class, 'index'])->name('index');
        Route::get('/ajax', [LableController::class, 'ajax'])->name('ajax');
        Route::get('/create', [LableController::class, 'create'])->name('create');
        Route::post('/store', [LableController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [LableController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [LableController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [LableController::class, 'destroy'])->name('destroy');
        Route::get('/getSubGroup/{id}', [LableController::class, 'getSubGroup'])->name('getSubGroup');


    });


});
