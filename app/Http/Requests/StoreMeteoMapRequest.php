<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreMeteoMapRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('meteo_map_create');
    }

    public function rules()
    {
        return [
            'batch_version' => [
                'string',
                'required',
            ],
            'station_name' => [
                'string',
                'nullable',
            ],
            'alt' => [
                'string',
                'required',
            ],
            'lng' => [
                'string',
                'required',
            ],
            'lat' => [
                'string',
                'required',
            ],
            'temperature' => [
                'string',
                'nullable',
            ],
            'pressure' => [
                'string',
                'nullable',
            ],
            'wind_speed' => [
                'string',
                'nullable',
            ],
            'lat_direction' => [
                'string',
                'nullable',
            ],
            'cir_direction' => [
                'string',
                'nullable',
            ],
            'marker' => [
                'string',
                'nullable',
            ],
            'period' => [
                'string',
                'nullable',
            ],
            'rainfall' => [
                'string',
                'nullable',
            ],
            'snow' => [
                'string',
                'nullable',
            ],
            'min_temp' => [
                'string',
                'nullable',
            ],
            'max_temp' => [
                'string',
                'nullable',
            ],
        ];
    }
}
