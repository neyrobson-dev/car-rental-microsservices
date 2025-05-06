<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::middleware('auth.jwt')->post('bookings', [BookingController::class, 'store']);
