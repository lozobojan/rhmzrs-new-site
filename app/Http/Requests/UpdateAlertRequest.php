<?php

namespace App\Http\Requests;

use App\Models\Alert;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAlertRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('alert_edit');
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
