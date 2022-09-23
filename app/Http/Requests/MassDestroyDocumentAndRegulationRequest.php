<?php

namespace App\Http\Requests;

use App\Models\PublicCompetition;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDocumentAndRegulationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('document_and_regulation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:public_competitions,id',
        ];
    }
}
