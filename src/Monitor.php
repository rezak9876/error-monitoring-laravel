<?php

namespace Binism\ErrorMonitoring;

class Monitor
{
    public static function reportError($error)
    {
        return (new ErrorReport())->reportError($error);
    }
}
