<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAcceleroStationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('accelero_station_edit');
    }

    public function rules()
    {
        return [
            'batch_version' => [
                'string',
                'required',
            ],
            'serial_number' => [
                'string',
                'nullable',
            ],
            'station_id' => [
                'string',
                'required',
            ],
            'station_name' => [
                'string',
                'required',
            ],
            'network_code' => [
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
            'digitizer' => [
                'string',
                'nullable',
            ],
            'sensor' => [
                'string',
                'nullable',
            ],
        ];
    }
}
