<?php

namespace RezaK\ErrorMonitoringLaravel\Http;

use Illuminate\Support\Facades\Http;

class SendError
{
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function send($postFields)
    {
        $packageName = 'error-monitoring-laravel';
        $host = config($packageName . '.host');
        return Http::withOptions(['proxy' => $_SERVER['SERVER_ADDR'] . ':' .  $_SERVER['SERVER_PORT']])
            ->post("$host/api/{$this->token}/errors", $postFields);
    }
}
