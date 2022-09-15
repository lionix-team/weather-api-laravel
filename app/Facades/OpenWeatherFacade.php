<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array getByCoordinates(string $lat,string $lon)
 *
 */
class OpenWeatherFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'open_weather';
    }
}
