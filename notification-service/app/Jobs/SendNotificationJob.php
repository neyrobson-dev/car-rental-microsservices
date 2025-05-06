<?php

namespace App\Jobs;

use App\Models\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificationJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function handle(): void
    {
        // Salva a notificação no banco
        Notification::create([
            'email' => $this->data['email'],
            'message' => $this->data['message'],
            'status' => 'sent',
        ]);

        // Simula envio de e-mail/SMS
        \Log::info("Notificação enviada para {$this->data['email']}: {$this->data['message']}");
    }
}
