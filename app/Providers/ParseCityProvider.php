<?php

namespace App\Providers;

use App\Services\ParseCityService;
use Illuminate\Support\ServiceProvider;

class ParseCityProvider extends ServiceProvider
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
        $this->app->bind('parse',function(){
            return new ParseCityService();
        });
    }
}
