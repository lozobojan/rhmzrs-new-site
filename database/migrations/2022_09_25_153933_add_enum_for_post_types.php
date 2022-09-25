<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('posts', function (Blueprint $table) {
      $table->enum('type', [
        'post',
        'static',   // Zakucane stranice / WYSIWYG
        'alert',
        'bulletin', // Bliten
        'report',
        'paper',    // Radovi
        'pollutant_map',    // MOPL u WP / Mapa zagadjivaca
      ])
        ->after('title')
        ->default('post');

      $table->json('metadata')->after('type')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('posts', function (Blueprint $table) {
      $table->dropColumn('type');
      $table->dropColumn('metadata');
    });
  }
};
