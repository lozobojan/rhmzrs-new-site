<?php

namespace App\Imports;

use App\Models\Earthquake;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EarthquakesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Earthquake([
            'earthquake_date' => $row['datum'],
            'earthquake_time' => $row['vrijeme'],
            'earthquake_type' => 'FINAL',
            'lat' => $row['latitude'],
            'lng' => $row['longitude'],
            'depth' => $row['dubina'],
            'magnitude' => $row['magnituda'],
            'place' => $row['mjesto'],
            'municipality' => $row['opstina'],
            'publish_status' => "PUBLISHED"
        ]);
    }
}
