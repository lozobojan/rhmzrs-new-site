<?php

namespace App\Console\Commands;

use App\Service\ImportDataService;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Command\Command as CommandResponse;

class ImportDataCommand extends Command implements ShouldQueue
{
    protected $signature = 'parse {filename} {arrayKey}';
    protected $description = 'Parse .json files';

    private ImportDataService $importDataService;

    /**
     * @param ImportDataService $importDataService
     */
    public function __construct(ImportDataService $importDataService)
    {
        $this->importDataService = $importDataService;
        parent::__construct($this);
    }

    public function handle(): int
    {
        try {
            $jsonString = Storage::disk('local')->get('import_data/' . $this->argument('filename'));
            $fileData = json_decode($jsonString, true);
            switch (json_last_error()) {
                case JSON_ERROR_NONE:
                    $this->upsertFileToDbAndDelete($fileData[$this->argument('arrayKey')]);
                    break;
                case JSON_ERROR_DEPTH:
                    info('Maximum stack depth exceeded: ' . $this->argument('filename'));
                    break;
                case JSON_ERROR_STATE_MISMATCH:
                    info('Underflow or the modes mismatch: ' . $this->argument('filename'));
                    break;
                case JSON_ERROR_CTRL_CHAR:
                    info('Unexpected control character found: ' . $this->argument('filename'));
                    break;
                case JSON_ERROR_SYNTAX:
                    info('Syntax error, malformed JSON: ' . $this->argument('filename'));
                    $this->tryRepairingJson($jsonString);
                    break;
                case JSON_ERROR_UTF8:
                    info('Malformed UTF-8 characters, possibly incorrectly encoded: ' . $this->argument('filename'));
                    break;
                default:
                    info('Unknown error: ' . $this->argument('filename'));
                    break;
            }

        } catch (Exception $exception) {
            info($exception->getMessage());
            return CommandResponse::FAILURE;
        }
        return CommandResponse::SUCCESS;
    }

    private function upsertFileToDbAndDelete(array $fileData): void
    {
        switch ($this->argument('filename')) {
            case "zemljotresi.json":
                info("Importing zemljotresi.json");
                $this->importDataService->importEarthquakeData($fileData);
                break;
            case "AgroZemljiste.json":
                info("Importing AgroZemljiste.json");
                $this->importDataService->importAgriculturalLand($fileData);
                break;
            case "AkceleroStanice.json":
                info("Importing AkceleroStanice.json");
                $this->importDataService->importAcceleroStations($fileData);
                break;
            case "Bioprognoza.json":
                info("Importing Bioprognoza.json");
                $this->importDataService->importBioprogonses($fileData);
                break;
            case "EkoPodaci.json":
                info("Importing EkoPodaci.json");
                $this->importDataService->importEcoInformation($fileData);
                break;
            case "EkoStanice.json":
                info("Importing EkoStanice.json");
                $this->importDataService->importEcoStations($fileData);
                break;
            case "ekoZagadjivaci.json":
                info("Importing ekoZagadjivaci.json");
                $this->importDataService->importEcoPollutants($fileData);
                break;
            case "HidroPodaci.json":
                info("Importing HidroPodaci.json");
                $this->importDataService->importHydroInformation($fileData);
                break;
            case "MeteoMapa.json":
                info("Importing MeteoMapa.json");
                $this->importDataService->importMeteoMap($fileData);
                break;
            case "MeteoPodaci.json":
                info("Importing MeteoPodaci.json");
                $this->importDataService->importMeteoInformation($fileData);
                break;
            case "MeteoStanice.json":
                info("Importing MeteoStanice.json");
                $this->importDataService->importMeteoStations($fileData);
                break;
            case "pritisak.json":
                info("Importing pritisak.json");
                $this->importDataService->importPressureData($fileData);
                break;
            case "SeizmoStanice.json":
                info("Importing SeizmoStanice.json");
                $this->importDataService->importSeismicStations($fileData);
                break;
            case "temperatureTrenutne.json":
                info("Importing temperatureTrenutne.json");
                $this->importDataService->importCurrentTemperatures($fileData);
                break;
            case "vjetar.json":
                info("Importing vjetar.json");
                $this->importDataService->importWindData($fileData);
                break;
            default:
                info("None filename type matched.");
                break;
        }
        info('Imported file: ' . $this->argument('filename'));
    }

    private function tryRepairingJson(string $jsonString): void
    {
        info('Trying to repair file: ' . $this->argument('filename'));

        $removedChars = substr($jsonString, 3);

        $fileData = json_decode($removedChars, true);

        $this->upsertFileToDbAndDelete($fileData[$this->argument('arrayKey')]);
    }
}
