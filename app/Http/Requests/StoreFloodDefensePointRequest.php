<?php

namespace App\Http\Requests;

use App\Models\FloodDefensePoint;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFloodDefensePointRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('flood_defense_point_create');
    }

    public function rules()
    {
        return [
            'ordinal_number' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'place' => [
                'string',
                'min:2',
                'max:255',
                'required',
            ],
            'river_basin_id' => [
                'required',
                'integer',
            ],
            'ordinary_value' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'extraordinary_value' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'nnv' => [
                'string',
                'nullable',
            ],
            'vvv' => [
                'string',
                'nullable',
            ],
        ];
    }
}
