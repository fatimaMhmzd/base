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
use Modules\Blog\Http\Controllers\BlogController;
use Modules\Blog\Http\Controllers\Dashboard\AdminBlogController;


Route::prefix('blog')->group(function () {
        Route::get('/', [BlogController::class, 'test'])->name('test');


    Route::get('/add', [AdminBlogController::class, 'add'])->name('add');
    Route::get('/list', [AdminBlogController::class, 'list'])->name('list');
   /* Route::post('/add', [AdminBlogController::class, 'store'])->name('store');
    Route::post('/storeUpdate', [AdminBlogController::class, 'storeUpdate'])->name('store_update');
    Route::get('/test', [AdminBlogController::class, 'ajax'])->name('ajax');
    Route::get('/delete/{id}', [AdminBlogController::class, 'delete'])->name('delete');
    Route::get('/update/{id}', [AdminBlogController::class, 'update'])->name('update');*/

});
