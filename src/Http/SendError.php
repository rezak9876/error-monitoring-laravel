<?php

namespace RezaK\ErrorMonitoring\Http;

use Illuminate\Support\Facades\Http;

class SendError
{
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function send($postFields)
    {
        return Http::withOptions(['proxy' => $_SERVER['SERVER_ADDR'] . ':' .  $_SERVER['SERVER_PORT']])
            ->post("http://error-monitoring.test/api/{$this->token}/errors", $postFields);
    }
}
