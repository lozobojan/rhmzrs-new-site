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
        Schema::create('agricultural_lands', function (Blueprint $table) {
            $table->id();
            $table->string('batch_version');
            $table->string("station_id")->nullable();
            $table->string("station_name")->nullable();
            $table->string("lng")->nullable();
            $table->string("lat")->nullable();
            $table->string("alt")->nullable();
            $table->string("current_temperature")->nullable();
            $table->string("period")->nullable();
            $table->string("description")->nullable();
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
        Schema::dropIfExists('agricultural_lands');
    }
};
