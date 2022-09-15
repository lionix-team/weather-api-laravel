<?php

use App\Http\Controllers\CitiesController;
use Illuminate\Support\Facades\Route;



Route::post('create-city',[CitiesController::class,'create']);
Route::get('weathers',[CitiesController::class,'weathers']);
Route::get('weather',[CitiesController::class,'weather']);
