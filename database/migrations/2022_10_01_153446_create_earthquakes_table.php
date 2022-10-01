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
        Schema::create('earthquakes', function (Blueprint $table) {
            $table->id();
            $table->enum('earthquake_type', ['AUTOMATIC', 'FINAL'])->nullable();;
            $table->enum('publish_status', ['DRAFT', 'PUBLISHED']);
            $table->string('earthquake_date')->nullable();
            $table->string('earthquake_time')->nullable();;
            $table->string("lat")->nullable();;
            $table->string("lng")->nullable();;
            $table->string("depth")->nullable();;
            $table->string("magnitude")->nullable();;
            $table->string("place")->nullable();;
            $table->string("municipality")->nullable();;
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
        Schema::dropIfExists('earthquakes');
    }
};
