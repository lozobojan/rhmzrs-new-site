@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.meteoMap.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.meteo-maps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoMap.fields.id') }}
                        </th>
                        <td>
                            {{ $meteoMap->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoMap.fields.batch_version') }}
                        </th>
                        <td>
                            {{ $meteoMap->batch_version }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoMap.fields.station_name') }}
                        </th>
                        <td>
                            {{ $meteoMap->station_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoMap.fields.alt') }}
                        </th>
                        <td>
                            {{ $meteoMap->alt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoMap.fields.lng') }}
                        </th>
                        <td>
                            {{ $meteoMap->lng }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoMap.fields.lat') }}
                        </th>
                        <td>
                            {{ $meteoMap->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoMap.fields.temperature') }}
                        </th>
                        <td>
                            {{ $meteoMap->temperature }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoMap.fields.pressure') }}
                        </th>
                        <td>
                            {{ $meteoMap->pressure }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoMap.fields.wind_speed') }}
                        </th>
                        <td>
                            {{ $meteoMap->wind_speed }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoMap.fields.lat_direction') }}
                        </th>
                        <td>
                            {{ $meteoMap->lat_direction }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoMap.fields.cir_direction') }}
                        </th>
                        <td>
                            {{ $meteoMap->cir_direction }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoMap.fields.marker') }}
                        </th>
                        <td>
                            {{ $meteoMap->marker }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoMap.fields.period') }}
                        </th>
                        <td>
                            {{ $meteoMap->period }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoMap.fields.rainfall') }}
                        </th>
                        <td>
                            {{ $meteoMap->rainfall }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoMap.fields.snow') }}
                        </th>
                        <td>
                            {{ $meteoMap->snow }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoMap.fields.min_temp') }}
                        </th>
                        <td>
                            {{ $meteoMap->min_temp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoMap.fields.max_temp') }}
                        </th>
                        <td>
                            {{ $meteoMap->max_temp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoMap.fields.description') }}
                        </th>
                        <td>
                            {!! $meteoMap->description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.meteo-maps.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
