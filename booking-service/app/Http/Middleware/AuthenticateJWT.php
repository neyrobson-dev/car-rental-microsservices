<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;

class AuthenticateJWT
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        if (!$token) {
            return response()->json(['error' => 'Token não fornecido'], 401);
        }

        $response = Http::withToken($token)->get('http://auth-service:8000/api/me');

        if ($response->status() !== 200) {
            return response()->json(['error' => 'Token inválido'], 401);
        }

        $request->merge(['user' => $response->json()]);
        return $next($request);
    }
}
