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
use Modules\Page\Http\Controllers\PageController;

//Route::prefix('page')->group(function() {
//    Route::get('/', 'PageController@index');
//});


Route::get('/', [PageController::class, 'index'])->name('indexClient');
Route::get('/compare', [PageController::class, 'compare'])->name('compareClient');
Route::get('/wishlist', [PageController::class, 'wishlist'])->name('wishlistClient');
Route::get('/about', [PageController::class, 'about'])->name('aboutClient');

