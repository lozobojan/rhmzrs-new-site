<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomSQLDumpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sqlFiles = [
          'pages',
          'links',
          'posts',
          'public_competitions',
          'public_purchases',
          'media',
        ];

        foreach ($sqlFiles as $file) {
            $path = base_path("sql_dumps/$file.sql");
            $sql = str_replace("INSERT INTO rhmzrs.", "INSERT INTO ", file_get_contents($path));
            DB::unprepared($sql);
        }
    }
}
