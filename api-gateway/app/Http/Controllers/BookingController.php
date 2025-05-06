<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $response = Http::post('http://booking-service:8000/api/bookings', $request->all());
        return $response->json();
    }
}
