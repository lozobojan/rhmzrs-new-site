<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreCurrentTemperatureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('current_temperature_create');
    }

    public function rules()
    {
        return [
            'batch_version' => [
                'string',
                'required',
            ],
            'station' => [
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
            'current_temperature' => [
                'string',
                'required',
            ],
            'period' => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
