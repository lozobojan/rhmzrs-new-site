<?php

namespace App\Http\Requests;

use App\Models\Alert;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAlertRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('alert_create');
    }

    public function rules()
    {
        return [
            'active' => [
                'nullable',
            ],
            'title' => [
                'string',
                'min:3',
                'max:255',
                'required',
            ],
            'level' => [
                'required',
                'in:0,1,2',
            ],
        ];
    }
}
