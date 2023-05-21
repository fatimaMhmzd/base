<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\SocialMedia\Http\Controllers\Api\v1\SocialMediaController;

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
    Route::prefix('social-media')->group(function () {
        Route::get('/', [SocialMediaController::class, 'index']);
        Route::get('/{id}', [SocialMediaController::class, 'find']);
        Route::delete('/{id}', [SocialMediaController::class, 'delete']);
        Route::post('/{id}', [SocialMediaController::class, 'update']);
        Route::post('/', [SocialMediaController::class, 'store']);
    });

});
