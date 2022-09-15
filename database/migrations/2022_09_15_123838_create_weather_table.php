<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->timestamp('time');
            $table->string('name');
            $table->decimal('latitude');
            $table->decimal('longitude');
            $table->decimal('temperature');
            $table->integer('pressure');
            $table->integer('humidity');
            $table->float('min_temperature');
            $table->float('max_temperature');
            $table->timestamps();
            $table->foreign('city_id')->references('id')->on('cities')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weather');
    }
}



