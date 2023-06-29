<?php

namespace RezaK\ErrorMonitoringLaravel;

class Monitor
{
    public static function reportError($error)
    {
        return (new ErrorReport())->reportError($error);
    }
}
