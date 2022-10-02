<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Command\Command as CommandResponse;

class ScanForFilesCommand extends Command
{
    protected $signature = 'scan:files';
    protected $description = 'Scan for files and start job';

    public function handle(): int
    {
        $files = Storage::disk('local')->allFiles('import_data');
        foreach ($files as $file) {
            $nameOfFile = explode('/', $file);

            match ($nameOfFile[1]) {
                'AgroZemljiste.json' => Artisan::call("parse {$nameOfFile[1]} TemperatureZemljista"),
                'AkceleroStanice.json' => Artisan::call("parse {$nameOfFile[1]} AkceleroStanice"),
                'Bioprognoza.json' => Artisan::call("parse {$nameOfFile[1]} BioPrognoza"),
                'EkoPodaci.json' => Artisan::call("parse {$nameOfFile[1]} EkoPodaci"),
                'EkoStanice.json' => Artisan::call("parse {$nameOfFile[1]} EkoStanice"),
                'ekoZagadjivaci.json' => Artisan::call("parse {$nameOfFile[1]} EkoZagadjivaci"),
                'HidroPodaci.json' => Artisan::call("parse {$nameOfFile[1]} HidroPodaci"),
                'HidroStanice.json' => Artisan::call("parse {$nameOfFile[1]} HidroStanice"),
                'MeteoMapa.json' => Artisan::call("parse {$nameOfFile[1]} MeteoMapaGlavna"),
                'MeteoPodaci.json' => Artisan::call("parse {$nameOfFile[1]} MeteoPodaci"),
                'MeteoStanice.json' => Artisan::call("parse {$nameOfFile[1]} MeteoStanice"),
                'pritisak.json' => Artisan::call("parse {$nameOfFile[1]} Pritisak"),
                'SeizmoStanice.json' => Artisan::call("parse {$nameOfFile[1]} SeizmoStanice"),
                'temperatureTrenutne.json' => Artisan::call("parse {$nameOfFile[1]} TemperatureTrenutne"),
                'vjetar.json' => Artisan::call("parse {$nameOfFile[1]} Vjetar"),
                'zemljotresi.json' => Artisan::call("parse {$nameOfFile[1]} Zemljotresi"),
                default => info('No command for parsing: ' . $nameOfFile[1])
            };
        }
        return CommandResponse::SUCCESS;
    }
}
