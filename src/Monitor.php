<?php

namespace RezaK\ErrorMonitoring;

class Monitor
{
    public static function reportError($error)
    {
        return (new ErrorReport())->reportError($error);
    }
}
