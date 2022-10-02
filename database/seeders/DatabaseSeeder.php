<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            UpdateDocumentAndRegulationPermissionsSeeder::class,
            ImportDataSeeder::class
        ]);

        if(config('custom_properties.use_custom_dump')){
            $this->call([
                CustomSQLDumpSeeder::class
            ]);
        }

    }
}
