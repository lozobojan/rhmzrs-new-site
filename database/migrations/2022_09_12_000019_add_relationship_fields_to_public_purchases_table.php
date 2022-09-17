<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPublicPurchasesTable extends Migration
{
    public function up()
    {
        Schema::table('public_purchases', function (Blueprint $table) {
            $table->unsignedBigInteger('page_id')->nullable();
            $table->foreign('page_id', 'page_fk_7299096')->references('id')->on('pages');
        });
    }
}
