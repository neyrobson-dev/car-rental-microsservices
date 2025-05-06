<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FleetController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\NotificationController;

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::prefix('fleet')->group(function () {
    Route::get('vehicles', [FleetController::class,'index']);
    Route::post('vehicles', [FleetController::class,'store']);
    Route::get('vehicles/{id}', [FleetController::class,'show']);
    Route::put('vehicles/{id}', [FleetController::class,'update']);
    Route::delete('vehicles/{id}', [FleetController::class,'destroy']);
});

Route::prefix('booking')->group(function () {
    Route::post('bookings', [BookingController::class, 'store']);
});

Route::prefix('notification')->group(function () {
    Route::get('notifications', [NotificationController::class, 'index']);
});
