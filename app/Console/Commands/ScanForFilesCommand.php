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

            match ($nameOfFile[1]) { // todo: make string in match and run command after that, add delete (settings or .env)
//                'AgroZemljiste.json' => Artisan::call('parse ' . $nameOfFile[1] . ' TemperatureZemljista ' . 'App\\\\Models\\\\Import\\\\AgroZemljiste'),
//                'AkceleroStanice.json' => Artisan::call('parse ' . $nameOfFile[1] . ' AkceleroStanice ' . 'App\\\\Models\\\\Import\\\\AkceleroStanice'),
//                'Bioprognoza.json' => Artisan::call('parse ' . $nameOfFile[1] . ' BioPrognoza ' . 'App\\\\Models\\\\Import\\\\Bioprognoza'),
////                'EkoPodaci20220330120000.json' => Artisan::call('parse ' . $nameOfFile[1] . ' EkoPodaci ' . 'App\\\\Models\\\\Import\\\\EkoPodaci20220330120000'),
//                'EkoStanice.json' => Artisan::call('parse ' . $nameOfFile[1] . ' EkoStanice ' . 'App\\\\Models\\\\Import\\\\EkoStanice'),
//                'ekoZagadjivaci.json' => Artisan::call('parse ' . $nameOfFile[1] . ' EkoZagadjivaci ' . 'App\\\\Models\\\\Import\\\\EkoZagadjivaci'),
//                'HidroPodaci.json' => Artisan::call('parse ' . $nameOfFile[1] . ' HidroPodaci ' . 'App\\\\Models\\\\Import\\\\HidroPodaci'),
//                'HidroStanice.json' => Artisan::call('parse ' . $nameOfFile[1] . ' HidroStanice ' . 'App\\\\Models\\\\Import\\\\HidroStanice'),
//                'MeteoMapa.json' => Artisan::call('parse ' . $nameOfFile[1] . ' MeteoMapaGlavna ' . 'App\\\\Models\\\\Import\\\\MeteoMapa'),
//                'MeteoPodaci.json' => Artisan::call('parse ' . $nameOfFile[1] . ' MeteoPodaci ' . 'App\\\\Models\\\\Import\\\\MeteoPodaci'),
//                'MeteoStanice.json' => Artisan::call('parse ' . $nameOfFile[1] . ' MeteoStanice ' . 'App\\\\Models\\\\Import\\\\MeteoStanice'),
//                'pritisak.json' => Artisan::call('parse ' . $nameOfFile[1] . ' Pritisak ' .  'App\\\\Models\\\\Import\\\\Pritisak'),
//                'SeizmoStanice.json' => Artisan::call('parse ' . $nameOfFile[1] . ' SeizmoStanice ' . 'App\\\\Models\\\\Import\\\\SeizmoStanice'),
//                'temperatureTrenutne.json' => Artisan::call('parse ' . $nameOfFile[1] . ' TemperatureTrenutne ' . 'App\\\\Models\\\\Import\\\\TemperatureTrenutne'),
//                'vjetar.json' => Artisan::call('parse ' . $nameOfFile[1] . ' Vjetar ' . 'App\\\\Models\\\\Import\\\\Vjetar'),
                'zemljotresi.json' => Artisan::call('parse ' . $nameOfFile[1] . ' Zemljotresi ' . 'App\\\\Models\\\\Import\\\\Zemljotresi'),
                default => info('No command for parsing: ' . $nameOfFile[1])
            };
        }
        return CommandResponse::SUCCESS;
    }
}
