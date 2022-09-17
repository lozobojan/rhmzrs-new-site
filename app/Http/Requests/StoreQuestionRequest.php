<?php

namespace App\Http\Requests;

use App\Models\Question;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('question_create');
    }

    public function rules()
    {
        return [
            'text' => [
                'string',
                'min:1',
                'max:255',
                'required',
            ],
            'text_answer' => [
                'required',
            ],
            'questionnaire_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
