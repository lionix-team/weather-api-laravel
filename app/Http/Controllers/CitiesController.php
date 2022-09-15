<?php

namespace App\Http\Controllers;

use App\Facades\OpenWeatherFacade;
use App\Http\Requests\CreateCityRequest;
use App\Http\Requests\WeatherRequest;
use App\Models\City;
use App\Models\Weather;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class CitiesController extends Controller
{
    /**
     * @var City
     */
    private $city;

    /**
     * @var Weather
     */
    private $weather;

    /**
     * @param City $city
     * @param Weather $weather
     */
    public function __construct(City $city, Weather $weather)
    {
        $this->city = $city;
        $this->weather = $weather;
    }

    /**
     * @param CreateCityRequest $request
     * @return Application|ResponseFactory|Response
     */
    public function create(CreateCityRequest $request)
    {
        DB::beginTransaction();
        try {
            $city = $this->city->store($request->all());
            $weatherData = OpenWeatherFacade::getByCoordinates($city->latitude, $city->longitude);
            $weatherData['city_id'] = $city->id;
            $this->weather->store($weatherData);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return response(['message' => 'error'], 422);
        }
        return response(['message' => 'success']);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function weathers(): LengthAwarePaginator
    {
        return $this->weather->allWeathers();
    }

    /**
     * @param WeatherRequest $request
     * @return Builder|Model|object|null
     */
    public function weather(WeatherRequest $request)
    {
        return $this->weather->getWeather($request->search_term);
    }
}
