<?php

use Illuminate\Support\Facades\Route;
use Modules\Location\Http\Controllers\Dashboard\AreaController;
use Modules\Location\Http\Controllers\Dashboard\CityController;
use Modules\Location\Http\Controllers\Dashboard\CountryController;
use Modules\Location\Http\Controllers\Dashboard\ProvinceController;
use Modules\Location\Http\Controllers\Dashboard\TownController;

Route::group(['prefix' => 'location', 'as' => 'location_'], function () {
    Route::group(['prefix' => 'country', 'as' => 'country_'], function () {
        Route::get('/', [CountryController::class, 'index'])->name('index');
        Route::get('/ajax', [CountryController::class, 'ajax'])->name('ajax');
        Route::get('/create', [CountryController::class, 'create'])->name('create');
        Route::post('/store', [CountryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CountryController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CountryController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [CountryController::class, 'destroy'])->name('destroy');


    });
    Route::group(['prefix' => 'province', 'as' => 'province_'], function () {
        Route::get('/', [ProvinceController::class, 'index'])->name('index');
        Route::get('/ajax', [ProvinceController::class, 'ajax'])->name('ajax');
        Route::get('/create', [ProvinceController::class, 'create'])->name('create');
        Route::post('/store', [ProvinceController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProvinceController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ProvinceController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [ProvinceController::class, 'destroy'])->name('destroy');


    });
    Route::group(['prefix' => 'city', 'as' => 'city_'], function () {
        Route::get('/', [CityController::class, 'index'])->name('index');
        Route::get('/ajax', [CityController::class, 'ajax'])->name('ajax');
        Route::get('/create', [CityController::class, 'create'])->name('create');
        Route::post('/store', [CityController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CityController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CityController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [CityController::class, 'destroy'])->name('destroy');


    });
    Route::group(['prefix' => 'town', 'as' => 'town_'], function () {
        Route::get('/', [TownController::class, 'index'])->name('index');
        Route::get('/ajax', [TownController::class, 'ajax'])->name('ajax');
        Route::get('/create', [TownController::class, 'create'])->name('create');
        Route::post('/store', [TownController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [TownController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [TownController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [TownController::class, 'destroy'])->name('destroy');


    });
    Route::group(['prefix' => 'area', 'as' => 'area_'], function () {
        Route::get('/', [AreaController::class, 'index'])->name('index');
        Route::get('/ajax', [AreaController::class, 'ajax'])->name('ajax');
        Route::get('/create', [AreaController::class, 'create'])->name('create');
        Route::post('/store', [AreaController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AreaController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [AreaController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [AreaController::class, 'destroy'])->name('destroy');


    });
});
