<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::group(['middleware' => ['throttle:10,1']], function () {
//    Route::post('register', [\App\Http\Controllers\Api\AuthController::class, 'register'])->name('register.api');
//    Route::post('login', [\App\Http\Controllers\Api\AuthController::class, 'login'])->name('login.api');
//});
//
//Route::middleware(['auth:sanctum'])->group(function () {
//    Route::get('test', [\App\Http\Controllers\Api\TestApiController::class, 'test'])->middleware(['throttle:1,1']);
//    Route::post('logout', [\App\Http\Controllers\Api\AuthController::class, 'logout'])->name('logout.api');
//    Route::post('inverters/overview',[\App\Http\Controllers\Api\DataController::class, 'invertersOverview'])->name('inverters-overview.api');
//    Route::post('inverter',[\App\Http\Controllers\Api\DataController::class, 'inverterInfo'])->name('inverter-info.api');
//});


