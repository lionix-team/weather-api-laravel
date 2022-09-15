<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array getCities()
 */
class ParseCityFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'parse';
    }
}
