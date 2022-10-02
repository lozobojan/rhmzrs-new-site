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
        Schema::create('hydro_information', function (Blueprint $table) {
            $table->id();
            $table->string('batch_version');
            $table->string('station_id')->nullable();
            $table->string('station_name')->nullable();
            $table->string('alt')->nullable();
            $table->string('lng')->nullable();
            $table->string('lat')->nullable();
            $table->string('absolute_min')->nullable();
            $table->string('absolute_min_date')->nullable();
            $table->string('absolute_max')->nullable();
            $table->string('absolute_max_date')->nullable();
            $table->string('regular_elevation')->nullable();
            $table->string('irregular_elevation')->nullable();
            $table->string('about')->nullable();
            $table->string('period')->nullable();
            $table->string('water_level')->nullable();
            $table->string('temperature')->nullable();
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
        Schema::dropIfExists('hydro_information');
    }
};
