<?php

namespace RezaK\ErrorMonitoringLaravel;

use Illuminate\Support\ServiceProvider;

class ErrorMonitoringServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/error-monitoring-laravel.php'=> config_path('error-monitoring-laravel.php'),
        ]);
    }

}
