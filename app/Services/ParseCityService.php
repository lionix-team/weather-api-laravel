<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class ParseCityService
{
    /**
     * @return array
     */
    public function getCities(): array
    {
        $content = File::get(config("cities.cities_json"));
        try {
            return json_decode($content, true);
        } catch (\Exception $exception) {

        }
        return [];
    }
}
