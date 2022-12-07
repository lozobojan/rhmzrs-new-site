<?php

namespace App\Http\Requests;

use App\Models\HydroInformation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHydroInformationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hydro_information_edit');
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
            'absolute_min' => [
                'string',
                'nullable',
            ],
            'absolute_min_date' => [
                'string',
                'nullable',
            ],
            'absolute_max' => [
                'string',
                'nullable',
            ],
            'absolute_max_date' => [
                'string',
                'nullable',
            ],
            'regular_elevation' => [
                'string',
                'nullable',
            ],
            'irregular_elevation' => [
                'string',
                'nullable',
            ],
            'about' => [
                'string',
                'nullable',
            ],
            'period' => [
                'string',
                'nullable',
            ],
            'water_level' => [
                'string',
                'nullable',
            ],
            'temperature' => [
                'string',
                'nullable',
            ],
        ];
    }
}
