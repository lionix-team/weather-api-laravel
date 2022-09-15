<?php

namespace App\Models;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['city_id','time','name', 'latitude', 'longitude','temperature','pressure','humidity','min_temperature','max_temperature'];

    /**
     * @param array $data
     * @return Builder|Model
     */
    public function store(array $data)
    {
        return $this->query()->create($data);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function allWeathers():LengthAwarePaginator
    {
        return $this->query()->paginate(20);
    }

    /**
     * @param string $searchTerm
     * @return Builder|Model|object|null
     */
    public function getWeather(string $searchTerm)
    {
        return $this->query()->where('name',$searchTerm)->first();
    }
}


