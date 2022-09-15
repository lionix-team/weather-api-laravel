<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['name', 'latitude', 'longitude'];

    /**
     * @param array $data
     * @return Builder|Model
     */
    public function store(array $data)
    {
        return $this->query()->create($data);
    }

    /**
     * @return Builder[]|Collection
     */
    public function getAll()
    {
        return $this->query()->select('id', 'name', 'latitude', 'longitude')->get();
    }

}
