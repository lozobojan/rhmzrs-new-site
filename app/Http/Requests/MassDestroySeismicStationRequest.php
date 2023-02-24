<?php

namespace App\Http\Requests;

use App\Models\Earthquake;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySeismicStationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('seismic-station_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:seismic_stations,id',
        ];
    }
}
