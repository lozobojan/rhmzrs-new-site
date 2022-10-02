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
        Schema::create('accelero_stations', function (Blueprint $table) {
            $table->id();
            $table->string('batch_version');
            $table->string("serial_number")->nullable();
            $table->string("station_id")->nullable();
            $table->string("station_name")->nullable();
            $table->string("network_code")->nullable();
            $table->string("alt")->nullable();
            $table->string("lng")->nullable();
            $table->string("lat")->nullable();
            $table->string("digitizer")->nullable();
            $table->string("sensor")->nullable();
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
        Schema::dropIfExists('accelero_stations');
    }
};
