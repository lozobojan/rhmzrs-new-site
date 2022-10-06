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
Route::get('meteo-stations', [DataController::class, 'getMeteoStations']);
