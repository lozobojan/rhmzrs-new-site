<?php

use App\Http\Controllers\Api\DataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;

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

Route::get('/proxya', function (Request $request) {
    // Get the URL to proxy from the "url" query parameter
    $resourceUrl = $request->query('url');

    // Generate a unique cache key based on the URL
    $cacheKey = 'proxy_' . md5($resourceUrl);

    // Try to retrieve the response from the cache
    $cachedResponse = Cache::get($cacheKey);

    if (!$cachedResponse) {
        // If the response is not in the cache, fetch it using Guzzle
        $client = new Client();
        $response = $client->get($resourceUrl);

        // Cache the response for 1 hour (or adjust the TTL as needed)
        $cachedResponse = $response->getBody()->getContents();
        Cache::put($cacheKey, $cachedResponse, 60 * 60);
    }

    // Return the response body with the appropriate headers
    return response($cachedResponse)->header('Content-Type', $response->getHeader('Content-Type')[0]);
});

Route::get('/proxy', function (Request $request) {
    $url = $request->input('url');
    $cacheKey = 'proxy-' . md5($url);

    // Try to retrieve the cached response
    if (Cache::has($cacheKey)) {
        $response = Cache::get($cacheKey);
        return response($response['content'])->header('Content-Type', $response['content_type']);
    }

    // Make the request to the original source
    $client = new Client();
    try {
        $response = $client->request('GET', $url, [
            'verify' => false,
        ]);

        $content = $response->getBody()->getContents();

        // Replace relative URLs with absolute URLs pointing to the original source
        $content = preg_replace_callback('/<(script|link)\s+(?:[^>]*?\s+)?(src|href)=([\'"])(.*?)\3/', function($match) use ($url) {
            $attribute = $match[2];
            $relativeUrl = $match[4];
            if (stripos($relativeUrl, 'http://') !== 0 && stripos($relativeUrl, 'https://') !== 0) {
                if (str_starts_with($relativeUrl, '../')) {
                    // Handle patterns with two "../" segments
                    $count = 2;
                    $relativeUrl = str_replace('../', '../../', $relativeUrl, $count);
                    $absoluteUrl = rtrim($url, '/') . '/' . ltrim($relativeUrl, '/');
                } else {
                    // Handle patterns with one "../" segment
                    $absoluteUrl = rtrim(dirname($url), '/') . '/' . ltrim($relativeUrl, '/');
                }
                return "<{$match[1]} $attribute=\"$absoluteUrl\"";
            }
            return $match[0];
        }, $content);

        // If Guzzle throws an exception set the content to the error message

        // Cache the response
        $response = [
            'content' => $content,
            'content_type' => $response->getHeader('Content-Type')[0],
        ];
        Cache::put($cacheKey, $response, now()->addMinutes(60));

        return response($content)->header('Content-Type', $response['content_type']);


    } catch (\Exception $e) {
        // Return html with error message
        return response()->view('errors.proxy', ['url' => $url, 'error' => $e->getMessage()]);
    }
    // If exception is thrown, return error message


});
