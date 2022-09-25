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
        Schema::table('document_and_regulations', function (Blueprint $table) {
            $table->dropForeign('page_fk_document_and_regulations');
            $table->dropColumn('page_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('document_and_regulations', function (Blueprint $table) {
            $table->foreign('page_id', 'page_fk_document_and_regulations')->references('id')->on('pages');
        });
    }
};
