<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFloodDefensePointsTable extends Migration
{
    public function up()
    {
        Schema::create('flood_defense_points', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ordinal_number');
            $table->string('place');
            $table->integer('ordinary_value');
            $table->integer('extraordinary_value');
            $table->foreignId('river_basin_id')->constrained('river_basins');
            $table->string('nnv')->nullable();
            $table->string('vvv')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
