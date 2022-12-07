<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreBioPrognosiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bio_prognosi_create');
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
            'value' => [
                'string',
                'nullable',
            ],
        ];
    }
}
