<?php

namespace App\Http\Requests;

use App\Models\HydroInformation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHydroInformationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('hydro_information_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:hydro_informations,id',
        ];
    }
}
