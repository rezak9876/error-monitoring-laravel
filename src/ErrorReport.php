<?php

namespace Binism\ErrorMonitoring;

use Binism\ErrorMonitoring\Http\PrepareBody;
use Binism\ErrorMonitoring\Http\SendError;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class ErrorReport
{

    public function __construct()
    {
        $packageName = 'error-monitoring';
        $this->token =config($packageName.'.token');
    }

    public function reportError($error)
    {
        if (env('ERROR_MONITORING') and $this->token) {

            //request body param
            $postFields = (new PrepareBody($error))->getPostFields();

            //send information as http request
            return (new SendError($this->token))->send($postFields);

        }
    }


}
