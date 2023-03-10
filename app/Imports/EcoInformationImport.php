<?php

namespace App\Imports;

use App\Models\Earthquake;
use App\Models\EcoInformation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EcoInformationImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $stationName = $row['stanica'];

        $existingRow = EcoInformation::where('station_name', $stationName)->first();
        if ($existingRow) {
            // update existing row with new attributes
            $updatedAttributes = [];

            // map the import header names to the corresponding attribute names
            $attributeMap = [
                'lat' => 'lat',
                'lng' => 'lng',
                'alt' => 'alt',
                'termin' => 'vrijeme',
                'co' => 'co',
                'o2' => 'o2',
                'no2' => 'no2',
                'so2' => 'so2',
                'pm10' => 'pm10',
                'pm25' => 'pm25',
                'nox' => 'nox',
                'temperatura' => 'temperature',
                'vlaznost' => 'humidity',
                'pritisak' => 'pressure',
                'brzina vjetra' => 'wind_speed',
                'smjer vjetra' => 'wind_direction',
                'kolicina padavina' => 'rainfall',
                'solarna radijacija' => 'solar_radiation',
                'indeks' => 'ik',
            ];

            // check each attribute in the row and map to the corresponding model attribute name
            foreach ($row as $key => $value) {
                if ($value !== null) {
                    $attributeName = $attributeMap[$key] ?? $key;
                    $updatedAttributes[$attributeName] = $value;
                }
            }

            $existingRow->update($updatedAttributes);

            return $existingRow;
        } else {
            // create new row
            return new EcoInformation([
                'batch_version' => $row['batch_version'] ?? 'null',
                'lat' => $row['lat'] ?? 'null',
                'lng' => $row['lng'] ?? 'null',
                'alt' => $row['alt'] ?? 'null',
                'station_name' => $stationName ?? 'null',
                'period' => $row['vrijeme'] ?? 'null',
                'co' => $row['co'] ?? 'null',
                'o2' => $row['o2'] ?? 'null',
                'no2' => $row['no2'] ?? 'null',
                'so2' => $row['so2'] ?? 'null',
                'pm10' => $row['pm10'] ?? 'null',
                'pm25' => $row['pm25'] ?? 'null',
                'nox' => $row['nox'] ?? 'null',
                'temperature' => $row['temperatura'] ?? 'null',
                'humidity' => $row['vlaznost'] ?? 'null',
                'pressure' => $row['pritisak'] ?? 'null',
                'wind_speed' => $row['brzina vjetra'] ?? 'null',
                'wind_direction' => $row['smjer vjetra'] ?? 'null',
                'rainfall' => $row['kolicina padavina'] ?? 'null',
                'solar_radiation' => $row['solarna radijacija'] ?? 'null',
                'ik' => $row['indeks'] ?? 'null',
            ]);
        }
    }
}
