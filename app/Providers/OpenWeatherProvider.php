<?php

namespace App\Providers;

use App\Services\OpenWeatherService;
use Illuminate\Support\ServiceProvider;
use RakibDevs\Weather\Weather;

class OpenWeatherProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('open_weather', function () {
            return new OpenWeatherService(
                (new Weather())
            );
        });
    }
}
