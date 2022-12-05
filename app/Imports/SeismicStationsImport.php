<?php

namespace App\Imports;

use App\Models\SeismicStation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SeismicStationsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new SeismicStation([
            'batch_version' => 1,
            'station_id' => $row['stationid'],
            'station_name' => $row['stationname'],
            'alt' => $row['alt'],
            'lng' => $row['lon'],
            'lat' => $row['lat'],
            'description' => $row['desc'],
        ]);
    }
}
