<?php

namespace App\Console\Commands;

use App\Facades\OpenWeatherFacade;
use App\Models\City;
use App\Models\Weather;
use Illuminate\Console\Command;

class UpdateWeather extends Command
{
    private $city;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updated every two minutes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(City $city)
    {
        parent::__construct();
        $this->city = $city;
    }

    /**
     * @return void
     */
    public function handle():void
    {
        foreach ($this->city->getAll() as $city) {
            $data = OpenWeatherFacade::getByCoordinates($city->latitude, $city->longitude);
            Weather::updateOrCreate(
                ['city_id' => $city->id],
                $data,
            );
        }
    }
}
