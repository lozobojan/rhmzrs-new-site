<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateWindRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('wind_edit');
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
                'required',
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
            'period' => [
                'string',
                'nullable',
            ],
        ];
    }
}
