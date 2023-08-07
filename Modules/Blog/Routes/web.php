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
use Modules\Blog\Http\Controllers\BlogGroupController;

Route::group(['prefix' => 'blog', 'as' => 'blog_'], function () {
    Route::get('/blog/{slug?}', [BlogGroupController::class, 'list'])->name('list');
    Route::get('/blogDetail/{slug}', [BlogController::class, 'show'])->name('blogDetail');
});


