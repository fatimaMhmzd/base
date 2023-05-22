<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Page\Http\Controllers\Api\v1\PageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    Route::prefix('page')->group(function () {
        Route::get('/', [PageController::class, 'index']);
        Route::get('/{id}', [PageController::class, 'find']);
        Route::delete('/{id}', [PageController::class, 'delete']);
        Route::post('/{id}', [PageController::class, 'update']);
        Route::post('/', [PageController::class, 'store']);
    });

});
