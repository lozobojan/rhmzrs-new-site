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
        Schema::create('meteo_information', function (Blueprint $table) {
            $table->id();
            $table->string('batch_version');
            $table->string('station_id')->nullable();
            $table->string('station_name')->nullable();
            $table->string('alt')->nullable();
            $table->string('lng')->nullable();
            $table->string('lat')->nullable();
            $table->longText('description')->nullable();
            $table->string('marker')->nullable();
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
        Schema::dropIfExists('meteo_information');
    }
};