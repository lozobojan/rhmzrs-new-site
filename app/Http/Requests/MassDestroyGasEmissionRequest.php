<?php

namespace App\Http\Requests;

use App\Models\GasEmission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGasEmissionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('gas_emission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:gas_emissions,id',
        ];
    }
}
