<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'link_create',
            ],
            [
                'id'    => 19,
                'title' => 'link_edit',
            ],
            [
                'id'    => 20,
                'title' => 'link_show',
            ],
            [
                'id'    => 21,
                'title' => 'link_delete',
            ],
            [
                'id'    => 22,
                'title' => 'link_access',
            ],
            [
                'id'    => 23,
                'title' => 'page_create',
            ],
            [
                'id'    => 24,
                'title' => 'page_edit',
            ],
            [
                'id'    => 25,
                'title' => 'page_show',
            ],
            [
                'id'    => 26,
                'title' => 'page_delete',
            ],
            [
                'id'    => 27,
                'title' => 'page_access',
            ],
            [
                'id'    => 28,
                'title' => 'post_create',
            ],
            [
                'id'    => 29,
                'title' => 'post_edit',
            ],
            [
                'id'    => 30,
                'title' => 'post_show',
            ],
            [
                'id'    => 31,
                'title' => 'post_delete',
            ],
            [
                'id'    => 32,
                'title' => 'post_access',
            ],
            [
                'id'    => 33,
                'title' => 'public_competition_create',
            ],
            [
                'id'    => 34,
                'title' => 'public_competition_edit',
            ],
            [
                'id'    => 35,
                'title' => 'public_competition_show',
            ],
            [
                'id'    => 36,
                'title' => 'public_competition_delete',
            ],
            [
                'id'    => 37,
                'title' => 'public_competition_access',
            ],
            [
                'id'    => 38,
                'title' => 'public_purchase_create',
            ],
            [
                'id'    => 39,
                'title' => 'public_purchase_edit',
            ],
            [
                'id'    => 40,
                'title' => 'public_purchase_show',
            ],
            [
                'id'    => 41,
                'title' => 'public_purchase_delete',
            ],
            [
                'id'    => 42,
                'title' => 'public_purchase_access',
            ],
            [
                'id'    => 43,
                'title' => 'project_create',
            ],
            [
                'id'    => 44,
                'title' => 'project_edit',
            ],
            [
                'id'    => 45,
                'title' => 'project_show',
            ],
            [
                'id'    => 46,
                'title' => 'project_delete',
            ],
            [
                'id'    => 47,
                'title' => 'project_access',
            ],
            [
                'id'    => 48,
                'title' => 'questionnaire_create',
            ],
            [
                'id'    => 49,
                'title' => 'questionnaire_edit',
            ],
            [
                'id'    => 50,
                'title' => 'questionnaire_show',
            ],
            [
                'id'    => 51,
                'title' => 'questionnaire_delete',
            ],
            [
                'id'    => 52,
                'title' => 'questionnaire_access',
            ],
            [
                'id'    => 53,
                'title' => 'question_create',
            ],
            [
                'id'    => 54,
                'title' => 'question_edit',
            ],
            [
                'id'    => 55,
                'title' => 'question_show',
            ],
            [
                'id'    => 56,
                'title' => 'question_delete',
            ],
            [
                'id'    => 57,
                'title' => 'question_access',
            ],
            [
                'id'    => 58,
                'title' => 'answer_create',
            ],
            [
                'id'    => 59,
                'title' => 'answer_edit',
            ],
            [
                'id'    => 60,
                'title' => 'answer_show',
            ],
            [
                'id'    => 61,
                'title' => 'answer_delete',
            ],
            [
                'id'    => 62,
                'title' => 'answer_access',
            ],
            [
                'id'    => 63,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
