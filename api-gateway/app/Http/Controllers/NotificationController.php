<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $response = Http::get('http://notification-service:8000/api/notifications');
        return $response->json();
    }
}
