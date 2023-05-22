<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Slider\Http\Controllers\Api\v1\SliderController;

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
    Route::prefix('slider')->group(function () {
        Route::get('/', [SliderController::class, 'index']);
        Route::get('/{id}', [SliderController::class, 'find']);
        Route::delete('/{id}', [SliderController::class, 'delete']);
        Route::post('/{id}', [SliderController::class, 'update']);
        Route::post('/', [SliderController::class, 'store']);
    });

});
