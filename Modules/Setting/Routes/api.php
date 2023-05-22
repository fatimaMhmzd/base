<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Setting\Http\Controllers\Api\v1\SettingController;

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
    Route::prefix('setting')->group(function () {
        Route::get('/', [SettingController::class, 'index']);
        Route::get('/{id}', [SettingController::class, 'find']);
        Route::delete('/{id}', [SettingController::class, 'delete']);
        Route::post('/{id}', [SettingController::class, 'update']);
        Route::post('/', [SettingController::class, 'store']);
    });

});
