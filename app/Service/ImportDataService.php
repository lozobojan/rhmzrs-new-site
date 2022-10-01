<?php

namespace App\Service;

use App\Mapper\ImportDataMapper;
use App\Models\Earthquake;
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
        $fileData = $this->importDataMapper->mapEarthquakeData($fileData);
        Log::info("Importing selected data into earthquakes table: \n", $fileData);
        Earthquake::query()->insert($fileData);
    }
}
