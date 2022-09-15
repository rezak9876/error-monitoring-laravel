<?php

namespace Binism\ErrorMonitoring\Http;

use Illuminate\Support\Facades\Http;

class SendError
{
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function send($postFields)
    {
        return Http::post("http://error-monitoring.pzhame.ir/api/{$this->token}/errors", $postFields);
    }

}
