<?php

namespace App\Http\Requests;

use App\Models\PublicCompetition;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPublicCompetitionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('public_competition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
