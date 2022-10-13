<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataController extends Controller
{
    // getEarthquakes method to get all earthquakes from the database
    public function getEarthquakes(): \Illuminate\Http\JsonResponse
    {
        // Get all earthquakes from the database
        $earthquakes = \App\Models\Earthquake::published();
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
}
