<?php

namespace App\Http\Requests;

use App\Models\RiverBasin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRiverBasinRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('river_basin_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'min:2',
                'max:255',
                'required',
            ],
        ];
    }
}
