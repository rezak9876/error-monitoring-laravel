<?php

namespace RezaK\ErrorMonitoringLaravel\Http;

use Illuminate\Support\Facades\URL;

class PrepareBody
{

    public function __construct($error)
    {
        $this->error = $error;
    }

    protected function getSystemInfo()
    {
        return [
            'systems_domain' => URL::to('/'),
            'systems_app_name' => env('APP_NAME'),
        ];
    }

    protected function getErrorInfo()
    {
        $error = $this->error;
        // calcute trace according to base path
        $trace = $error->getTrace();
        foreach ($trace as $key => $t) {
            //???
            $traceKey = $trace[$key];
            if (array_key_exists('file', $traceKey))
                $traceKey['file'] = str_replace(base_path(), "basePath", $t['file']);

            if (array_key_exists('args', $traceKey)) {
                foreach ($traceKey['args'] as $argkey => $arg) {
                    if (gettype($arg) === 'string')
                        $traceKey['args'][$argkey] = str_replace(base_path(), "basePath", $arg);
                }
            }
        }


        //error information array
        return [
            'errorlanguage' => 'php',
            'errorMessage' => $error->getMessage(),
            'errorCode' => $error->getCode(),
            'errorFile' => str_replace(base_path(), "basePath", $error->getFile()),
            'errorLine' => $error->getLine(),
            'errorTrace' => json_encode($trace)
        ];

    }

    public function getPostFields()
    {
        //system informations array
        $systems = $this->getSystemInfo();

        //error information array
        $error_array = $this->getErrorInfo();

        //request body param
        return array_merge($error_array, $systems);
    }
}
