<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicPurchasesTable extends Migration
{
    public function up()
    {
        Schema::create('public_purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('html_content')->nullable();
            $table->string('title')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
