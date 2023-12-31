<?php

namespace RezaK\ErrorMonitoringLaravel;

use RezaK\ErrorMonitoringLaravel\Http\PrepareBody;
use RezaK\ErrorMonitoringLaravel\Http\SendError;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class ErrorReport
{

    public function __construct()
    {
        $packageName = 'error-monitoring-laravel';
        $this->token =config($packageName.'.token');
    }

    public function reportError($error)
    {
        if (env('ERROR_MONITORING_LARAVEL') and $this->token) {

            //request body param
            $postFields = (new PrepareBody($error))->getPostFields();

            //send information as http request
            return (new SendError($this->token))->send($postFields);

        }
    }


}
