<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public static function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('html_content')->nullable();
            $table->string('title')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
