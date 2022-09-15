## Monitoring all errors



### Installation

#### register in our website
 http://error-monitoring.pzhame.ir/register

 in your account , create a project and get specific token
 

#### install package via composer
`composer require bin-ism/error-monitoring:dev-master`

#### publish vendor
php artisan vendor:publish --provider="Binism\ErrorMonitoring\ErrorMonitoringServiceProvider"

#
set your token in published file
### Usage
in app/Exceptions/Handler.php add blow code
```php 
 public function register()
    {
        $this->reportable(function (Throwable $e) {
            \Binism\ErrorMonitoring\Monitor::reportError($e);
        });
    }
```

now , whenever an error happend you can what complete detail in our website
### Author
Reza Karimi
