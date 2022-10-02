<?php

namespace App\Mapper;

class ImportDataMapper
{

    public function mapEarthquakeData($fileData, $maxBatchVersion): array
    {
        $newData = [];
        foreach ($fileData as $data) {
            $newData[] = [
                'batch_version' => $maxBatchVersion + 1,
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

    public function mapAgriculturalLandData(array $fileData, $maxBatchVersion): array
    {
        $newData = [];
        foreach ($fileData as $data) {
            $newData[] = [
                'batch_version' => $maxBatchVersion + 1,
                "station_id" => $data["StationID"] ?? null,
                "station_name" => $data["StationName"] ?? null,
                "lng" => $data["lon"] ?? null,
                "lat" => $data["lat"] ?? null,
                "alt" => $data["alt"] ?? null,
                "current_temperature" => $data["TrenutnaTemp"] ?? null,
                "period" => $data["termin"] ?? null,
                "description" => $data["desc"] ?? null,
                "created_at" => now(),
                "updated_at" => now(),
            ];
        }
        return $newData;
    }

    public function mapAcceleroStationData(array $fileData, $maxBatchVersion): array
    {
        $newData = [];
        foreach ($fileData as $data) {
            $newData[] = [
                'batch_version' => $maxBatchVersion + 1,
                "serial_number" => $data["Rr"] ?? null,
                "station_id" => $data["StationID"] ?? null,
                "station_name" => $data["StationName"] ?? null,
                "network_code" => $data["KodMreze"] ?? null,
                "alt" => $data["alt"] ?? null,
                "lng" => $data["lon"] ?? null,
                "lat" => $data["lat"] ?? null,
                "digitizer" => $data["Digitalizator"] ?? null,
                "sensor" => $data["Senzor"] ?? null,
                "created_at" => now(),
                "updated_at" => now(),
            ];
        }
        return $newData;
    }

    public function mapBioprognosisData(array $fileData, mixed $maxBatchVersion): array
    {
        $newData = [];
        foreach ($fileData as $data) {
            $newData[] = [
                'batch_version' => $maxBatchVersion + 1,
                "station_id" => $data["StationID"] ?? null,
                "station_name" => $data["StationName"] ?? null,
                "alt" => $data["alt"] ?? null,
                "lng" => $data["lon"] ?? null,
                "lat" => $data["lat"] ?? null,
                "value" => $data["value"] ?? null,
                "created_at" => now(),
                "updated_at" => now(),
            ];
        }
        return $newData;
    }

    public function mapEcoInformationData(array $fileData, mixed $maxBatchVersion): array
    {
        $newData = [];
        foreach ($fileData as $data) {
            $newData[] = [
                'batch_version' => $maxBatchVersion + 1,
                "station_id" => $data["StationID"] ?? null,
                "station_name" => $data["StationName"] ?? null,
                'lng' => $data['lon'] ?? null,
                'lat' => $data['lat'] ?? null,
                'alt' => $data['alt'] ?? null,
                'period' => $data['termin'] ?? null,
                'temperature' => $data['temperatura'] ?? null,
                'humidity' => $data['vlaznost'] ?? null,
                'pressure' => $data['pritisak'] ?? null,
                'solar_radiation' => $data['suncevoZracenje'] ?? null,
                'rainfall' => $data['padavine'] ?? null,
                'wind_speed' => $data['brzinaVjetra'] ?? null,
                'wind_direction' => $data['smjerVjetra'] ?? null,
                'o3' => $data['O3'] ?? null,
                'co' => $data['CO'] ?? null,
                'so2' => $data['SO2'] ?? null,
                'no' => $data['NO'] ?? null,
                'no2' => $data['NO2'] ?? null,
                'nox' => $data['NOx'] ?? null,
                'pm10' => $data['PM10'] ?? null,
                'pm25' => $data['PM25'] ?? null,
                'description' => $data['desc'] ?? null,
                "created_at" => now(),
                "updated_at" => now(),
            ];
        }
        return $newData;
    }

    public function mapEcoStationData(array $fileData, mixed $maxBatchVersion): array
    {
        $newData = [];
        foreach ($fileData as $data) {
            $newData[] = [
                'batch_version' => $maxBatchVersion + 1,
                "station_id" => $data["StationID"] ?? null,
                "station_name" => $data["StationName"] ?? null,
                "alt" => $data["alt"] ?? null,
                "lng" => $data["lon"] ?? null,
                "lat" => $data["lat"] ?? null,
                "description" => $data["desc"] ?? null,
                "created_at" => now(),
                "updated_at" => now(),
            ];
        }
        return $newData;
    }

    public function mapEcoPollutantData(array $fileData, mixed $maxBatchVersion): array
    {
        $newData = [];
        foreach ($fileData as $data) {
            $newData[] = [
                'batch_version' => $maxBatchVersion + 1,
                "station_id" => $data["StationID"] ?? null,
                "station_name" => $data["StationName"] ?? null,
                "alt" => $data["alt"] ?? null,
                "lng" => $data["lon"] ?? null,
                "lat" => $data["lat"] ?? null,
                "description" => $data["desc"] ?? null,
                "created_at" => now(),
                "updated_at" => now(),
            ];
        }
        return $newData;
    }

    public function mapHydroInformationData(array $fileData, mixed $maxBatchVersion): array
    {
        $newData = [];
        foreach ($fileData as $data) {
            $newData[] = [
                'batch_version' => $maxBatchVersion + 1,
                "station_id" => $data["StationID"] ?? null,
                "station_name" => $data["StationName"] ?? null,
                "alt" => $data["alt"] ?? null,
                "lng" => $data["lon"] ?? null,
                "lat" => $data["lat"] ?? null,
                'absolute_min' => $data['apsMin'] ?? null,
                'absolute_min_date' => $data['apsMinDatum'] ?? null,
                'absolute_max' => $data['apsMax'] ?? null,
                'absolute_max_date' => $data['apsMaxDatum'] ?? null,
                'regular_elevation' => $data['kotaRedovne'] ?? null,
                'irregular_elevation' => $data['kotaVanredne'] ?? null,
                'about' => $data['opis'] ?? null,
                'period' => $data['termin'] ?? null,
                'water_level' => $data['vodostaj'] ?? null,
                'temperature' => $data['temperatura'] ?? null,
                "description" => $data["desc"] ?? null,
                "created_at" => now(),
                "updated_at" => now(),
            ];
        }
        return $newData;
    }

    public function mapMeteoMapData(array $fileData, mixed $maxBatchVersion): array
    {
        $newData = [];
        foreach ($fileData as $data) {
            $newData[] = [
                'batch_version' => $maxBatchVersion + 1,
                "station_id" => $data["StationID"] ?? null,
                "station_name" => $data["StationName"] ?? null,
                "alt" => $data["alt"] ?? null,
                "lng" => $data["lon"] ?? null,
                "lat" => $data["lat"] ?? null,
                'temperature' => $data['temperatura'] ?? null,
                'pressure' => $data['pritisak'],
                'wind_speed' => $data['brzVjetra'],
                'lat_direction' => $data['latSmjer'],
                'cir_direction' => $data['cirSmjer'],
                'marker' => $data['marker'],
                'period' => $data['termin'],
                'rainfall' => $data['kolicinaPadavine'],
                'snow' => $data['snijeg'],
                'min_temp' => $data['minTemp'],
                'max_temp' => $data['maxTemp'],
                "description" => $data["desc"] ?? null,
                "created_at" => now(),
                "updated_at" => now(),
            ];
        }
        return $newData;
    }

    public function mapMeteoInformationData(array $fileData, mixed $maxBatchVersion): array
    {
        $newData = [];
        foreach ($fileData as $data) {
            $newData[] = [
                'batch_version' => $maxBatchVersion + 1,
                "station_id" => $data["StationID"] ?? null,
                "station_name" => $data["StationName"] ?? null,
                "alt" => $data["alt"] ?? null,
                "lng" => $data["lon"] ?? null,
                "lat" => $data["lat"] ?? null,
                "description" => $data["desc"] ?? null,
                'marker' => $data['marker'],
                "created_at" => now(),
                "updated_at" => now(),
            ];
        }
        return $newData;
    }

    public function mapMeteoStationData(array $fileData, mixed $maxBatchVersion): array
    {
        $newData = [];
        foreach ($fileData as $data) {
            $newData[] = [
                'batch_version' => $maxBatchVersion + 1,
                "station_id" => $data["StationID"] ?? null,
                "station_name" => $data["StationName"] ?? null,
                "alt" => $data["alt"] ?? null,
                "lng" => $data["lon"] ?? null,
                "lat" => $data["lat"] ?? null,
                "description" => $data["desc"] ?? null,
                "created_at" => now(),
                "updated_at" => now(),
            ];
        }
        return $newData;
    }

    public function mapPressureData(array $fileData, mixed $maxBatchVersion): array
    {
        $newData = [];
        foreach ($fileData as $data) {
            $newData[] = [
                'batch_version' => $maxBatchVersion + 1,
                "station_id" => $data["StationID"] ?? null,
                "station_name" => $data["StationName"] ?? null,
                "alt" => $data["alt"] ?? null,
                "lng" => $data["lon"] ?? null,
                "lat" => $data["lat"] ?? null,
                'pressure' => $data['pritisak'] ?? null,
                'period' => $data['termin'] ?? null,
                "description" => $data["desc"] ?? null,
                "created_at" => now(),
                "updated_at" => now(),
            ];
        }
        return $newData;
    }

    public function mapSeismicStatitionData(array $fileData, mixed $maxBatchVersion): array
    {
        $newData = [];
        foreach ($fileData as $data) {
            $newData[] = [
                'batch_version' => $maxBatchVersion + 1,
                "station_id" => $data["StationID"] ?? null,
                "station_name" => $data["StationName"] ?? null,
                "alt" => $data["alt"] ?? null,
                "lng" => $data["lon"] ?? null,
                "lat" => $data["lat"] ?? null,
                "description" => $data["desc"] ?? null,
                "created_at" => now(),
                "updated_at" => now(),
            ];
        }
        return $newData;
    }

    public function mapCurrentTemperatureData(array $fileData, mixed $maxBatchVersion)
    {
        $newData = [];
        foreach ($fileData as $data) {
            $newData[] = [
                'batch_version' => $maxBatchVersion + 1,
                "station_id" => $data["StationID"] ?? null,
                "station_name" => $data["StationName"] ?? null,
                "alt" => $data["alt"] ?? null,
                "lng" => $data["lon"] ?? null,
                "lat" => $data["lat"] ?? null,
                'current_temperature' => $data['TrenutnaTemp'] ?? null,
                'period' => $data['termin'] ?? null,
                "description" => $data["desc"] ?? null,
                "created_at" => now(),
                "updated_at" => now(),
            ];
        }
        return $newData;
    }

    public function mapWindData(array $fileData, mixed $maxBatchVersion): array
    {
        $newData = [];
        foreach ($fileData as $data) {
            $newData[] = [
                'batch_version' => $maxBatchVersion + 1,
                "station_id" => $data["StationID"] ?? null,
                "station_name" => $data["StationName"] ?? null,
                "alt" => $data["alt"] ?? null,
                "lng" => $data["lon"] ?? null,
                "lat" => $data["lat"] ?? null,
                'wind_speed' => $data['brzinaVjetra'],
                'lat_direction' => $data['latSmjer'],
                'cir_direction' => $data['cirSmjer'],
                'period' => $data['termin'],
                "description" => $data["desc"] ?? null,
                "created_at" => now(),
                "updated_at" => now(),
            ];
        }
        return $newData;
    }
}
