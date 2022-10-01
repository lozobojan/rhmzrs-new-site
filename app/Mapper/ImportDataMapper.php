<?php

namespace App\Mapper;

class ImportDataMapper
{

    public function mapEarthquakeData($fileData): array
    {
        $newData = [];
        foreach ($fileData as $data) {
            $newData[] = [
                'earthquake_type' => $data["tip"] ?? null, // todo change on client requirements
                'publish_status' => "DRAFT", // todo change on client requirements
                'earthquake_date' => $data["datum"] ?? null,
                'earthquake_time' => $data["vrijeme"] ?? null,
                "lat" => $data["latitude"] ?? null,
                "lng" => $data["longitude"] ?? null,
                "depth" => $data["dubina"] ?? null,
                "magnitude" => $data["magnituda"] ?? null,
                "place" => $data["mjesto"] ?? null,
                "municipality" => $data["opstina"] ?? null,
                "created_at" => now(),
                "updated_at" => now()
            ];
        }
        return $newData;
    }
}
