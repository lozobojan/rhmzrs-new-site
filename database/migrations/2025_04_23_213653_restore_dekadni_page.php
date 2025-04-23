<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('pages')->where('id', 65)->update(['deleted_at' => null]);
        DB::table('links')->where('id', 37)->update(['deleted_at' => null]);
    }

    public function down(): void
    {
        // Re-delete if someone rolls the migration back
        DB::table('pages')->where('id', 65)->update(['deleted_at' => now()]);
        DB::table('links')->where('id', 37)->update(['deleted_at' => now()]);
    }
};
