@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.meteoStation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.meteo-stations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoStation.fields.id') }}
                        </th>
                        <td>
                            {{ $meteoStation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoStation.fields.batch_version') }}
                        </th>
                        <td>
                            {{ $meteoStation->batch_version }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoStation.fields.station_name') }}
                        </th>
                        <td>
                            {{ $meteoStation->station_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoStation.fields.alt') }}
                        </th>
                        <td>
                            {{ $meteoStation->alt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoStation.fields.lng') }}
                        </th>
                        <td>
                            {{ $meteoStation->lng }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoStation.fields.lat') }}
                        </th>
                        <td>
                            {{ $meteoStation->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.meteoStation.fields.description') }}
                        </th>
                        <td>
                            {!! $meteoStation->description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.meteo-stations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
