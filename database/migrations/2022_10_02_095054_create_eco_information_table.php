<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eco_information', function (Blueprint $table) {
            $table->id();
            $table->string('batch_version');
            $table->string('station_id')->nullable();
            $table->string('station_name')->nullable();
            $table->string('lng')->nullable();
            $table->string('lat')->nullable();
            $table->string('alt')->nullable();
            $table->string('period')->nullable();
            $table->string('temperature')->nullable();
            $table->string('humidity')->nullable();
            $table->string('pressure')->nullable();
            $table->string('solar_radiation')->nullable();
            $table->string('rainfall')->nullable();
            $table->string('wind_speed')->nullable();
            $table->string('wind_direction')->nullable();
            $table->string('o3')->nullable();
            $table->string('co')->nullable();
            $table->string('so2')->nullable();
            $table->string('no')->nullable();
            $table->string('no2')->nullable();
            $table->string('nox')->nullable();
            $table->string('pm10')->nullable();
            $table->string('pm25')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eco_information');
    }
};
