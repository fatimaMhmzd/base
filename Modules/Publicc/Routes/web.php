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

use Illuminate\Routing\Route;
use Modules\Publicc\Http\Controllers\PubliccController;

Route::prefix('publicc')->group(function() {
    Route::get('/', 'PubliccController@index');
});

Route::get('/', PubliccController::class, 'index')->name('indexClient');
