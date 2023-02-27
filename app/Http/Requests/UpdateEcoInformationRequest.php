<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEcoInformationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('eco_information_edit');
    }

    public function rules()
    {
        return [
            'batch_version' => [
                'string',
                'required',
            ],
            'station_id' => [
                'string',
                'nullable',
            ],
            'station_name' => [
                'string',
                'required',
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
            'period' => [
                'string',
                'required',
            ],
            'temperature' => [
                'string',
                'required',
            ],
            'humidity' => [
                'string',
                'required',
            ],
            'pressure' => [
                'string',
                'required',
            ],
            'solar_radiation' => [
                'string',
                'required',
            ],
            'rainfall' => [
                'string',
                'required',
            ],
            'wind_speed' => [
                'string',
                'required',
            ],
            'wind_direction' => [
                'string',
                'required',
            ],
            'o3' => [
                'string',
                'required',
            ],
            'co' => [
                'string',
                'required',
            ],
            'so2' => [
                'string',
                'required',
            ],

            'no2' => [
                'string',
                'required',
            ],
            'nox' => [
                'string',
                'required',
            ],
            'pm10' => [
                'string',
                'required',
            ],
            'pm25' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'ik' => [
                'string',
                'nullable',
            ],
        ];
    }
}
