<?php

namespace App\Http\Requests;

use App\Models\GasEmission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGasEmissionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gas_emission_edit');
    }

    public function rules()
    {
        return [
            'type' => [
                'required',
            ],
            'gas' => [
                'string',
                'required',
            ],
            'year' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'value' => [
                'string',
                'required',
            ],
        ];
    }
}
