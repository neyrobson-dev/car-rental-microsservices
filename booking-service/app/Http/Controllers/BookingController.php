<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Jobs\NotifyUserJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $token = $request->bearerToken();
        $user = Http::withToken($token)->get('http://auth-service:8000/api/me');

        if ($user->status() !== 200) {
            return response()->json(['error' => 'Usuário não autenticado'], 401);
        }

        $vehicleCheck = Http::withToken($token)->get("http://fleet-service:8000/api/vehicles/{$request->vehicle_id}");

        if ($vehicleCheck->status() !== 200) {
            return response()->json(['error' => 'Veículo não existe'], 400);
        }

        if (!$vehicleCheck['available']) {
            return response()->json(['error' => 'Veículo não disponível'], 400);
        }

        $booking = Booking::create([
            'user_id' => $user['id'],
            'vehicle_id' => $request->vehicle_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 'confirmed',
        ]);

        // Atualizar disponibilidade do veículo
        Http::withToken($token)->put("http://fleet-service:8000/api/vehicles/{$request->vehicle_id}", [
            'available' => false
        ]);

        NotifyUserJob::dispatch([
            'email' => $user['email'],
            'message' => 'Sua reserva foi confirmada!',
        ]);

        return response()->json($booking, 201);
    }
}
