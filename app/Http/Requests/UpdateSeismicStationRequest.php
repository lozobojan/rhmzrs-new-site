<?php

namespace App\Http\Requests;

use App\Models\Earthquake;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSeismicStationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('seismic-station_edit');
    }

    public function rules()
    {
        return [
            'batch_version' => [
                'string',
                'nullable',
            ],
            'station_id' => [
                'required',
                'string',
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
            'description' => [
                'string',
                'nullable',
            ],

        ];
    }
}
