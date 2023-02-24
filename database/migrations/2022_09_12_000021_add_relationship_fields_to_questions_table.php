<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToQuestionsTable extends Migration
{
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->unsignedBigInteger('questionnaire_id')->nullable();
            $table->foreign('questionnaire_id', 'questionnaire_fk_7298986')->references('id')->on('questionnaires');
        });
    }
}
