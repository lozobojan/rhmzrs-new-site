<?php

namespace App\Http\Requests;

use App\Models\Questionnaire;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQuestionnaireRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('questionnaire_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'min:1',
                'max:255',
                'required',
            ],
        ];
    }
}
