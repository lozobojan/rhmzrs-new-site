<?php

namespace App\Http\Requests;

use App\Models\PublicCompetition;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDocumentAndRegulationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('document_and_regulation_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'description' => [
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
        ];
    }
}
