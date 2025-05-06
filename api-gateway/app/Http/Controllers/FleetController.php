<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FleetController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->bearerToken();

        $response = Http::withToken($token)->get('http://fleet-service:8000/api/vehicles');
        return $response->json();
    }

    public function store(Request $request)
    {
        $token = $request->bearerToken();

        $response = Http::withToken($token)->post('http://fleet-service:8000/api/vehicles', $request->all());
        return $response->json();
    }

    public function show(Request $request, $id)
    {
        $token = $request->bearerToken();

        $response = Http::withToken($token)->get("http://fleet-service:8000/api/vehicles/{$id}");
        return $response->json();
    }

    public function update(Request $request, $id)
    {
        $token = $request->bearerToken();

        $response = Http::withToken($token)->put("http://fleet-service:8000/api/vehicles/{$id}", $request->all());
        return $response->json();
    }

    public function destroy(Request $request, $id)
    {
        $token = $request->bearerToken();

        $response = Http::withToken($token)->delete("http://fleet-service:8000/api/vehicles/{$id}");
        return $response->json();
    }

}
