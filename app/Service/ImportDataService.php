<?php

namespace App\Service;

use App\Mapper\ImportDataMapper;
use App\Models\AcceleroStation;
use App\Models\AgriculturalLand;
use App\Models\Bioprognosis;
use App\Models\Earthquake;
use App\Models\EcoInformation;
use App\Models\EcoPollutant;
use App\Models\EcoStation;
use App\Models\HydroInformation;
use App\Models\MeteoInformation;
use App\Models\MeteoMap;
use Illuminate\Support\Facades\Log;

class ImportDataService
{
    private ImportDataMapper $importDataMapper;

    /**
     * @param ImportDataMapper $importDataMapper
     */
    public function __construct(ImportDataMapper $importDataMapper)
    {
        $this->importDataMapper = $importDataMapper;
    }


    public function importEarthquakeData($fileData): void
    {
        $maxBatchVersion = Earthquake::query()->max('batch_version') ?? 0;
        $fileData = $this->importDataMapper->mapEarthquakeData($fileData, $maxBatchVersion);
        Log::info("Importing selected data into earthquakes table: \n", $fileData);
        Earthquake::query()->insert($fileData);
    }

    public function importAgriculturalLand(array $fileData)
    {
        $maxBatchVersion = AgriculturalLand::query()->max('batch_version') ?? 0;
        $fileData = $this->importDataMapper->mapAgriculturalLandData($fileData, $maxBatchVersion);
        Log::info("Importing selected data into agricultural lands table: \n", $fileData);
        AgriculturalLand::query()->insert($fileData);
    }

    public function importAcceleroStations(array $fileData)
    {
        $maxBatchVersion = AcceleroStation::query()->max('batch_version') ?? 0;
        $fileData = $this->importDataMapper->mapAcceleroStationData($fileData, $maxBatchVersion);
        Log::info("Importing selected data into accelero stations table: \n", $fileData);
        AcceleroStation::query()->insert($fileData);
    }

    public function importBioprogonses(array $fileData)
    {
        $maxBatchVersion = Bioprognosis::query()->max('batch_version') ?? 0;
        $fileData = $this->importDataMapper->mapBioprognosisData($fileData, $maxBatchVersion);
        Log::info("Importing selected data into bio_prognoses table: \n", $fileData);
        Bioprognosis::query()->insert($fileData);
    }

    public function importEcoInformation(array $fileData)
    {
        $maxBatchVersion = EcoInformation::query()->max('batch_version') ?? 0;
        $fileData = $this->importDataMapper->mapEcoInformationData($fileData, $maxBatchVersion);
        Log::info("Importing selected data into eco_information table: \n", $fileData);
        EcoInformation::query()->insert($fileData);
    }

    public function importEcoStations(array $fileData)
    {
        $maxBatchVersion = EcoStation::query()->max('batch_version') ?? 0;
        $fileData = $this->importDataMapper->mapEcoStationData($fileData, $maxBatchVersion);
        Log::info("Importing selected data into eco_stations table: \n", $fileData);
        EcoStation::query()->insert($fileData);
    }

    public function importEcoPollutants(array $fileData)
    {
        $maxBatchVersion = EcoPollutant::query()->max('batch_version') ?? 0;
        $fileData = $this->importDataMapper->mapEcoPollutantData($fileData, $maxBatchVersion);
        Log::info("Importing selected data into eco_pollutants table: \n", $fileData);
        EcoPollutant::query()->insert($fileData);
    }

    public function importHydroInformation(array $fileData)
    {
        $maxBatchVersion = HydroInformation::query()->max('batch_version') ?? 0;
        $fileData = $this->importDataMapper->mapHydroInformationData($fileData, $maxBatchVersion);
        Log::info("Importing selected data into hydro_information table: \n", $fileData);
        HydroInformation::query()->insert($fileData);
    }

    public function importMeteoMap(array $fileData)
    {
        $maxBatchVersion = MeteoMap::query()->max('batch_version') ?? 0;
        $fileData = $this->importDataMapper->mapMeteoMapData($fileData, $maxBatchVersion);
        Log::info("Importing selected data into hydro_information table: \n", $fileData);
        MeteoMap::query()->insert($fileData);
    }

    public function importMeteoInformation(array $fileData)
    {
        $maxBatchVersion = MeteoInformation::query()->max('batch_version') ?? 0;
        $fileData = $this->importDataMapper->mapMeteoInformationData($fileData, $maxBatchVersion);
        Log::info("Importing selected data into hydro_information table: \n", $fileData);
        MeteoInformation::query()->insert($fileData);
    }
}
