<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;

Route::middleware('auth.jwt')->group(function () {
    Route::apiResource('vehicles', VehicleController::class);
});
