<?php

namespace Database\Seeders;

use App\Constants\RoleConstants;
use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UpdateDocumentAndRegulationPermissionsSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'title' => 'document_and_regulation_create',
            ],
            [
                'title' => 'document_and_regulation_edit',
            ],
            [
                'title' => 'document_and_regulation_show',
            ],
            [
                'title' => 'document_and_regulation_delete',
            ],
            [
                'title' => 'document_and_regulation_access',
            ],
        ];

        Permission::query()->insert($permissions);

        $documentAndRegulationPermissions = Permission::query()->where('title', 'like', "%document_and_regulation%")->get();

        $permissionRole = [];

        foreach ($documentAndRegulationPermissions as $documentAndRegulationPermission) {
            $permissionRole[] = [
                'role_id' => RoleConstants::ADMIN_ROLE,
                'permission_id' => $documentAndRegulationPermission->id
            ];
        }
        dump($documentAndRegulationPermissions);
        PermissionRole::query()->insert($permissionRole);
    }
}
