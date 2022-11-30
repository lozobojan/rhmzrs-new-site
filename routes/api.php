<?php

use App\Http\Controllers\Api\DataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('earthquakes', [DataController::class, 'getEarthquakes']);
Route::get('meteo-maps', [DataController::class, 'getMeteoMaps']);
Route::get('hydro-information', [DataController::class, 'getHydroInformation']);
Route::get('eco-information', [DataController::class, 'getEcoInformation']);
Route::get('eco-pollutants', [DataController::class, 'getEcoPollutants']);
Route::get('meteo-stations', [DataController::class, 'getMeteoStations']);
Route::get('accelero-stations', [DataController::class, 'getAcceleroStations']);
Route::get('seismic-stations', [DataController::class, 'getSeismicStations']);
// Flood defense points
Route::get('flood-defense-points', [DataController::class, 'getFloodDefensePoints']);
Route::get('ecology-data', [DataController::class, 'getEcologyData']);
Route::get('current-temperatures', [DataController::class, 'getCurrentTemperatures']);
Route::get('pressures', [DataController::class, 'getPressures']);
Route::get('wind', [DataController::class, 'getWind']);
Route::get('bio-prognoses', [DataController::class, 'getBioPrognoses']);
