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
        Schema::table('earthquakes', function (Blueprint $table) {
            $table->string('batch_version')->nullable()->change();
            $table->text('generated_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('earthquakes', function (Blueprint $table) {
            $table->string('batch_version')->change();
            $table->dropColumn('generated_description');
        });
    }
};
