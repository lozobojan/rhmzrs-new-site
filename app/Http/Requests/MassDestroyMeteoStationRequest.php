<?php

namespace App\Http\Requests;

use App\Models\MeteoStation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMeteoStationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('meteo_station_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:meteo_stations,id',
        ];
    }
}
