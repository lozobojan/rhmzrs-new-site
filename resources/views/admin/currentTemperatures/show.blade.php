@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.currentTemperature.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.current-temperatures.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.currentTemperature.fields.id') }}
                        </th>
                        <td>
                            {{ $currentTemperature->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currentTemperature.fields.batch_version') }}
                        </th>
                        <td>
                            {{ $currentTemperature->batch_version }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currentTemperature.fields.station_id') }}
                        </th>
                        <td>
                            {{ $currentTemperature->station_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currentTemperature.fields.station_name') }}
                        </th>
                        <td>
                            {{ $currentTemperature->station_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currentTemperature.fields.alt') }}
                        </th>
                        <td>
                            {{ $currentTemperature->alt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currentTemperature.fields.lng') }}
                        </th>
                        <td>
                            {{ $currentTemperature->lng }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currentTemperature.fields.lat') }}
                        </th>
                        <td>
                            {{ $currentTemperature->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currentTemperature.fields.current_temperature') }}
                        </th>
                        <td>
                            {{ $currentTemperature->current_temperature }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currentTemperature.fields.period') }}
                        </th>
                        <td>
                            {{ $currentTemperature->period }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currentTemperature.fields.description') }}
                        </th>
                        <td>
                            {{ $currentTemperature->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.current-temperatures.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
