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
        Schema::create('winds', function (Blueprint $table) {
            $table->id();
            $table->string('batch_version');
            $table->string('station_id')->nullable();
            $table->string('station_name')->nullable();
            $table->string('alt')->nullable();
            $table->string('lng')->nullable();
            $table->string('lat')->nullable();
            $table->string('wind_speed')->nullable();
            $table->string('lat_direction')->nullable();
            $table->string('cir_direction')->nullable();
            $table->string('period')->nullable();
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
        Schema::dropIfExists('winds');
    }
};
