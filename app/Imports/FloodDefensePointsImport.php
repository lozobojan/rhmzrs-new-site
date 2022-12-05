<?php

namespace App\Imports;

use App\Models\FloodDefensePoint;
use App\Models\RiverBasin;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FloodDefensePointsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FloodDefensePoint([
            'place' => $row['stationname'],
            'river_basin_id' => $this->findOrCreateRiverBasin($row['river']),
            'ordinary_value' => $row['normally'],
            'extraordinary_value' => $row['extraordinary'],
            'nnv' => $row['lowest'],
            'vvv' => $row['highest'],
            'ordinal_number' => $this->getLatestOrdinalNumber() + 1,
        ]);
    }

    // A function to find a river basin by name and create it if it doesn't exist
    public function findOrCreateRiverBasin($name)
    {
        $riverBasin = RiverBasin::where('title', $name)->first();
        if (!$riverBasin) {
            $riverBasin = RiverBasin::create(['title' => $name]);
        }
        return $riverBasin->id;
    }
    // A function to get latest ordinal number
    public function getLatestOrdinalNumber()
    {
        $latest = FloodDefensePoint::latest()->first();
        if ($latest) {
            return $latest->ordinal_number;
        }
        return 0;
    }
}
