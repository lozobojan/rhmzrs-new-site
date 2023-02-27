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
            [
                'id'    => 64,
                'title' => 'document_and_regulation_create',
            ],
            [
                'id'    => 65,
                'title' => 'document_and_regulation_edit',
            ],
            [
                'id'    => 66,
                'title' => 'document_and_regulation_show',
            ],
            [
                'id'    => 67,
                'title' => 'document_and_regulation_delete',
            ],
            [
                'id'    => 68,
                'title' => 'document_and_regulation_access',
            ],
            [
                'id'    => 69,
                'title' => 'river_basin_access',
            ],
            [
                'id'    => 70,
                'title' => 'river_basin_create',
            ],
            [
                'id'    => 71,
                'title' => 'river_basin_show',
            ],
            [
                'id'    => 72,
                'title' => 'river_basin_delete',
            ],
            [
                'id'    => 73,
                'title' => 'river_basin_edit',
            ],
            [
                'id'    => 74,
                'title' => 'flood_defense_point_access',
            ],
            [
                'id'    => 75,
                'title' => 'flood_defense_point_create',
            ],
            [
                'id'    => 76,
                'title' => 'flood_defense_point_show',
            ],
            [
                'id'    => 77,
                'title' => 'flood_defense_point_delete',
            ],
            [
                'id'    => 78,
                'title' => 'flood_defense_point_edit',
            ],
            [
                'id'    => 79,
                'title' => 'gas_emission_create',
            ],
            [
                'id'    => 80,
                'title' => 'gas_emission_edit',
            ],
            [
                'id'    => 81,
                'title' => 'gas_emission_show',
            ],
            [
                'id'    => 82,
                'title' => 'gas_emission_delete',
            ],
            [
                'id'    => 83,
                'title' => 'gas_emission_access',
            ],
            [
                'id'    => 84,
                'title' => 'earthquake_create',
            ],
            [
                'id'    => 85,
                'title' => 'earthquake_edit',
            ],
            [
                'id'    => 86,
                'title' => 'earthquake_show',
            ],
            [
                'id'    => 87,
                'title' => 'earthquake_delete',
            ],
            [
                'id'    => 88,
                'title' => 'earthquake_access',
            ],
            [
                'id'    => 89,
                'title' => 'alert_create',
            ],
            [
                'id'    => 90,
                'title' => 'alert_edit',
            ],
            [
                'id'    => 91,
                'title' => 'alert_show',
            ],
            [
                'id'    => 92,
                'title' => 'alert_delete',
            ],
            [
                'id'    => 93,
                'title' => 'alert_access',
            ],
            [
                'id'    => 94,
                'title' => 'seismic-station_create',
            ],
            [
                'id'    => 95,
                'title' => 'seismic-station_edit',
            ],
            [
                'id'    => 96,
                'title' => 'seismic-station_show',
            ],
            [
                'id'    => 97,
                'title' => 'seismic-station_delete',
            ],
            [
                'id'    => 98,
                'title' => 'seismic-station_access',
            ],
            [
                'id'    => 99,
                'title' => 'meteo_station_create',
            ],
            [
                'id'    => 100,
                'title' => 'meteo_station_edit',
            ],
            [
                'id'    => 101,
                'title' => 'meteo_station_show',
            ],
            [
                'id'    => 102,
                'title' => 'meteo_station_delete',
            ],
            [
                'id'    => 103,
                'title' => 'meteo_station_access',
            ],
            [
                'id'    => 104,
                'title' => 'meteo_map_create',
            ],
            [
                'id'    => 105,
                'title' => 'meteo_map_edit',
            ],
            [
                'id'    => 106,
                'title' => 'meteo_map_show',
            ],
            [
                'id'    => 107,
                'title' => 'meteo_map_delete',
            ],
            [
                'id'    => 108,
                'title' => 'meteo_map_access',
            ],
            [
                'id'    => 109,
                'title' => 'hydro_information_create',
            ],
            [
                'id'    => 110,
                'title' => 'hydro_information_edit',
            ],
            [
                'id'    => 111,
                'title' => 'hydro_information_show',
            ],
            [
                'id'    => 112,
                'title' => 'hydro_information_delete',
            ],
            [
                'id'    => 113,
                'title' => 'hydro_information_access',
            ],
            [
                'id'    => 114,
                'title' => 'eco_station_create',
            ],
            [
                'id'    => 115,
                'title' => 'eco_station_edit',
            ],
            [
                'id'    => 116,
                'title' => 'eco_station_show',
            ],
            [
                'id'    => 117,
                'title' => 'eco_station_delete',
            ],
            [
                'id'    => 118,
                'title' => 'eco_station_access',
            ],
            [
                'id'    => 119,
                'title' => 'wind_create',
            ],
            [
                'id'    => 120,
                'title' => 'wind_edit',
            ],
            [
                'id'    => 121,
                'title' => 'wind_show',
            ],
            [
                'id'    => 122,
                'title' => 'wind_delete',
            ],
            [
                'id'    => 123,
                'title' => 'wind_access',
            ],
            [
                'id'    => 124,
                'title' => 'accelero_station_create',
            ],
            [
                'id'    => 125,
                'title' => 'accelero_station_edit',
            ],
            [
                'id'    => 126,
                'title' => 'accelero_station_show',
            ],
            [
                'id'    => 127,
                'title' => 'accelero_station_delete',
            ],
            [
                'id'    => 128,
                'title' => 'accelero_station_access',
            ],
            [
                'id'    => 129,
                'title' => 'bio_prognosi_create',
            ],
            [
                'id'    => 130,
                'title' => 'bio_prognosi_edit',
            ],
            [
                'id'    => 131,
                'title' => 'bio_prognosi_show',
            ],
            [
                'id'    => 132,
                'title' => 'bio_prognosi_delete',
            ],
            [
                'id'    => 133,
                'title' => 'bio_prognosi_access',
            ],
            [
                'id'    => 134,
                'title' => 'current_temperature_create',
            ],
            [
                'id'    => 135,
                'title' => 'current_temperature_edit',
            ],
            [
                'id'    => 136,
                'title' => 'current_temperature_show',
            ],
            [
                'id'    => 137,
                'title' => 'current_temperature_delete',
            ],
            [
                'id'    => 138,
                'title' => 'current_temperature_access',
            ],
            [
                'id'    => 139,
                'title' => 'eco_information_create',
            ],
            [
                'id'    => 140,
                'title' => 'eco_information_edit',
            ],
            [
                'id'    => 141,
                'title' => 'eco_information_show',
            ],
            [
                'id'    => 142,
                'title' => 'eco_information_delete',
            ],
            [
                'id'    => 143,
                'title' => 'eco_information_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
