<?php

namespace Database\Seeders;

use App\Models\GasEmission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GasEmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gases = [];

        $handle = fopen(storage_path()."/app/import_data/ghg_gasovi.csv", 'a+');
        while(($gas = fgetcsv($handle, 1000, ",")) !== FALSE){
            if ($gas[0] == 'tip') continue;
            $gases[] = [
                'type' => $gas[0],
                'gas' => $gas[1],
                'year' => $gas[2],
                'value' => $gas[3],
            ];
        }

        GasEmission::query()->insert($gases);
    }
}
