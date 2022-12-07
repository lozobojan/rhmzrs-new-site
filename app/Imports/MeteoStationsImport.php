<?php

namespace App\Imports;

use App\Models\MeteoStation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MeteoStationsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new MeteoStation([
            'station_id' => $row['stationid'],
            'batch_version' => 1,
            'station_name' => $row['stationname'],
            'alt' => $row['alt'],
            'lat' => $row['lat'],
            'lng' => $row['lon'],
            'desc' => $row['desc'],
        ]);
    }
}

