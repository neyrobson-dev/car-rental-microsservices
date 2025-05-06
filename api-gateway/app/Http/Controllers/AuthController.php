<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        return $response->json($request->all());
        $response = Http::post('http://auth-service:8000/api/register', $request->all());

        return $response->json();
    }

    public function login(Request $request)
    {
        $response = Http::post('http://auth-service:8000/api/login', $request->all());

        return $response->json();
    }
}
