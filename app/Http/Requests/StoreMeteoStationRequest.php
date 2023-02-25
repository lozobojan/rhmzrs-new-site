<?php

namespace App\Http\Requests;

use App\Models\MeteoStation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMeteoStationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('meteo_station_create');
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
        ];
    }
}
