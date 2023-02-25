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
        Schema::create('meteo_maps', function (Blueprint $table) {
            $table->id();
            $table->string('batch_version');
            $table->string('station_id')->nullable();
            $table->string('station_name')->nullable();
            $table->string('alt')->nullable();
            $table->string('lng')->nullable();
            $table->string('lat')->nullable();
            $table->string('temperature')->nullable();
            $table->string('pressure')->nullable();
            $table->string('wind_speed')->nullable();
            $table->string('lat_direction')->nullable();
            $table->string('cir_direction')->nullable();
            $table->string('marker')->nullable();
            $table->string('period')->nullable();
            $table->string('rainfall')->nullable();
            $table->string('snow')->nullable();
            $table->string('min_temp')->nullable();
            $table->string('max_temp')->nullable();
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
        Schema::dropIfExists('meteo_maps');
    }
};
