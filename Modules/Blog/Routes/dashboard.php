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

Route::group(['prefix' => 'blog', 'as' => 'blog_'], function (){
    Route::get('/', [AdminBlogController::class, 'index'])->name('index');
    Route::get('/ajax', [AdminBlogController::class, 'ajax'])->name('ajax');
    Route::get('/create', [AdminBlogController::class, 'create'])->name('create');
    Route::post('/store', [AdminBlogController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AdminBlogController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [AdminBlogController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [AdminBlogController::class, 'destroy'])->name('destroy');


});
