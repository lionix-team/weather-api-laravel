<?php

namespace Database\Seeders;

use App\Facades\OpenWeatherFacade;
use App\Facades\ParseCityFacade;
use App\Models\City;
use App\Models\Weather;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * @var City
     */
    private $city;

    /**
     * @param City $city
     */
    public function __construct(City $city)
    {
        $this->city = $city;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (ParseCityFacade::getCities() as $city) {
            DB::beginTransaction();
            try {
                $city =  $this->city->store([
                    'name' => $city['city'],
                    'latitude' => $city['lat'],
                    'longitude' => $city['lng']
                ]);
                $data = OpenWeatherFacade::getByCoordinates($city->latitude, $city->longitude);
                Weather::updateOrCreate(
                    ['city_id' => $city->id],
                    $data,
                );
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
            }
        }
    }
}
