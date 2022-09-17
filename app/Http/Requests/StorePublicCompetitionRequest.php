<?php

namespace App\Http\Requests;

use App\Models\PublicCompetition;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePublicCompetitionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('public_competition_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'attachments' => [
                'array',
                'required',
            ],
            'attachments.*' => [
                'required',
            ],
            'date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'page_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
