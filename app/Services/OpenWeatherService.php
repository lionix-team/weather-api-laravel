<?php

namespace App\Services;

use Carbon\Carbon;
use RakibDevs\Weather\Weather;

class OpenWeatherService
{
    /**
     * @var Weather
     */
    private $client;

    /**
     * @param Weather $client
     */
    public function __construct(Weather $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $lat
     * @param string $lon
     * @return array
     */
    public function getByCoordinates(string $lat, string $lon): array
    {
        return $this->takeData($lat, $lon);
    }

    /**
     * @param string $lat
     * @param string $lon
     * @return array
     */
    private function takeData(string $lat, string $lon): array
    {
        try {
            $data = json_decode(json_encode($this->client->getCurrentByCord($lat, $lon)), true);
            return [
                'time' => Carbon::parse($data['dt'])->format('Y-m-d H:i:s'),
                'name' => $data['name'],
                'latitude' => $data['coord']['lat'],
                'longitude' => $data['coord']['lon'],
                'temperature' => $data['main']['temp'],
                'pressure' => $data['main']['pressure'],
                'humidity' => $data['main']['humidity'],
                'min_temperature' => $data['main']['temp_min'],
                'max_temperature' => $data['main']['temp_max']
            ];
        } catch (\Exception $exception) {

        }
        return [];
    }
}
