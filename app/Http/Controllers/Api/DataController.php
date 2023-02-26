<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DataController extends Controller
{
    // getEarthquakes method to get all earthquakes from the database
    public function getEarthquakes(Request $request): \Illuminate\Http\JsonResponse
    {

        // Get all earthquakes whos earthquake_date (which is in format DD.MM.YYYY) is in lasst 3 days





        $earthquakes = \App\Models\Earthquake::query()
            ->when($request->type, function ($query) use ($request) {
                return $query->where('earthquake_type', '=', $request->type);
            })->whereRaw("STR_TO_DATE(earthquake_date, '%d.%m.%Y') BETWEEN ? AND ?", [
                Carbon::now()->subDays(3)->toDateString(),
                Carbon::now()->toDateString()
            ])->
        published();

        // Return the earthquakes as JSON
        return response()->json($earthquakes);
    }

    // Get all meteo information from the database
    public function getMeteoMaps(): \Illuminate\Http\JsonResponse
    {
        // Get all meteo information from the database
        $meteoMaps = \App\Models\MeteoMap::all();
        // Return the meteo information as JSON
        return response()->json($meteoMaps);
    }

    // Get all hydro information from the database
    public function getHydroInformation(): \Illuminate\Http\JsonResponse
    {
        // Get all hydro information from the database
        $hydroInformation = \App\Models\HydroInformation::query()->where('lat', '!=', 'null')->get();
        // Return the hydro information as JSON
        return response()->json($hydroInformation);
    }

    // Get all eco information from the database
    public function getEcoInformation(): \Illuminate\Http\JsonResponse
    {
        // Get all eco information from the database
        $ecoInformation = \App\Models\EcoInformation::all();
        // Return the eco information as JSON
        return response()->json($ecoInformation);
    }

    // Get all eco pollutants from the database
    public function getEcoPollutants(): \Illuminate\Http\JsonResponse
    {
        // Get all eco pollutants from the database
        $ecoPollutants = \App\Models\EcoPollutant::all();
        // Return the eco pollutants as JSON
        return response()->json($ecoPollutants);
    }

    // Get all meteo stations from the database
    public function getMeteoStations(): \Illuminate\Http\JsonResponse
    {
        // Get all meteo stations from the database
        $meteoStations = \App\Models\MeteoStation::all();
        // Return the meteo stations as JSON
        return response()->json($meteoStations);
    }

    // Get all accelero stations from the database
    public function getAcceleroStations(): \Illuminate\Http\JsonResponse
    {
        // Get all accelero stations from the database
        $acceleroStations = \App\Models\AcceleroStation::all();
        // Return the accelero stations as JSON
        return response()->json($acceleroStations);
    }

    // Get all seismic stations from the database
    public function getSeismicStations(): \Illuminate\Http\JsonResponse
    {
        // Get all seismic stations from the database
        $seismicStations = \App\Models\SeismicStation::all();
        // Return the seismic stations as JSON
        return response()->json($seismicStations);
    }

    // Get all flood defense points from the database
    public function getFloodDefensePoints(): \Illuminate\Http\JsonResponse
    {
        // Get all flood defense points from the database
        $floodDefensePoints = \App\Models\FloodDefensePoint::with('river_basin')->get();
        // Return the flood defense points as JSON
        return response()->json($floodDefensePoints);
    }

    // Get all ecology data from the database
    public function getEcologyData(): \Illuminate\Http\JsonResponse
    {
        // Get all ecology data from the database
        $gasses = [];
        $ecologyData = \App\Models\GasEmission::query()
            ->groupBy('year', 'gas')
            ->selectRaw('sum(value) as value, gas, year')
            ->get();
        foreach ($ecologyData as $data) {
            $gasses[$data->year][] = $data;
        }

        // Return the ecology data as JSON
        return response()->json($gasses);
    }

    // Get current temperature from the database
    public function getCurrentTemperatures(): \Illuminate\Http\JsonResponse
    {
        // Get current temperature from the database
        $currentTemperature = \App\Models\CurrentTemperature::all();
        // Return the current temperature as JSON
        return response()->json($currentTemperature);
    }

    // Get all pressure data from the database
    public function getPressures(): \Illuminate\Http\JsonResponse
    {
        // Get all pressure data from the database
        $pressureData = \App\Models\Pressure::all();
        // Return the pressure data as JSON
        return response()->json($pressureData);
    }

    // Get all wind data from the database
    public function getWind(): \Illuminate\Http\JsonResponse
    {
        // Get all wind data from the database
        $windData = \App\Models\Wind::all();
        // Return the wind data as JSON
        return response()->json($windData);
    }

    // get all bio prognoses from the database
    public function getBioPrognoses(): \Illuminate\Http\JsonResponse
    {
        // Get all bio prognoses from the database
        $bioPrognoses = \App\Models\Bioprognosis::all();
        // Return the bio prognoses as JSON
        return response()->json($bioPrognoses);
    }
}
