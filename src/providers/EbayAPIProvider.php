<?php

namespace Tnaffh\eBayAPI\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class EbayAPIProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/ebay.php' => config_path('ebay.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('ebay', function () {
            $client = new Client([
                'base_uri' => 'https://api.sandbox.ebay.com/',
                'headers' => [
                    'X-Auth-Token' => getenv('EBAY_SECRET_KEY'),
                    'X-Response-Control' => 'full',
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json'
                ]
            ]);
            return new Ebay($client);
        });
    }
}
