<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\LogoutController;
use App\Http\Controllers\Api\V1\Auth\PasswordUpdateController;
use App\Http\Controllers\Api\V1\Auth\ProfileController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use App\Http\Controllers\Api\V1\VehicleController;
use App\Http\Controllers\parkingController;
use Illuminate\Support\Facades\Route;


/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', [ProfileController::class, 'show']);
    Route::put('profile', [ProfileController::class, 'update']);
    Route::put('password', PasswordUpdateController::class);

    Route::apiResource('vehicles',VehicleController::class);

    Route::post('parkings/start',[parkingController::class,'start']);
    Route::get('parkings/{parking}',[parkingController::class,'show']);
    Route::get('parkings/{parking}',[parkingController::class,'stop']);

    Route::post('auth/logout', LogoutController::class);
});

Route::post('auth/register', RegisterController::class);
Route::post('auth/login', LoginController::class);

Route::get('zones',[\App\Http\Controllers\Api\V1\ZoneController::class,'index']);
