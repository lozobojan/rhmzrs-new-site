<?php

namespace App\Http\Requests;

use App\Models\Earthquake;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEarthquakeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('earthquake_edit');
    }

    public function rules()
    {
        return [
            'batch_version' => [
                'string',
                'nullable',
            ],
            'earthquake_type' => [
                'required',
            ],
            'earthquake_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'earthquake_time' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'lat' => [
                'string',
                'nullable',
            ],
            'lng' => [
                'string',
                'nullable',
            ],
            'depth' => [
                'string',
                'nullable',
            ],
            'magnitude' => [
                'string',
                'nullable',
            ],
            'place' => [
                'string',
                'nullable',
            ],
            'municipality' => [
                'string',
                'nullable',
            ],
        ];
    }
}
