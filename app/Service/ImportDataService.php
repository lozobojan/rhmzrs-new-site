<?php

namespace App\Service;

use App\Mapper\ImportDataMapper;
use App\Models\AcceleroStation;
use App\Models\AgriculturalLand;
use App\Models\Bioprognosis;
use App\Models\Earthquake;
use App\Models\EcoInformation;
use App\Models\EcoStation;
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
        Log::info("Importing selected data into bio_prognoses table: \n", $fileData);
        EcoInformation::query()->insert($fileData);
    }

    public function importEcoStations(array $fileData)
    {
        $maxBatchVersion = EcoStation::query()->max('batch_version') ?? 0;
        $fileData = $this->importDataMapper->mapEcoStationData($fileData, $maxBatchVersion);
        Log::info("Importing selected data into bio_prognoses table: \n", $fileData);
        EcoStation::query()->insert($fileData);
    }
}
