@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.acceleroStation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.accelero-stations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.acceleroStation.fields.id') }}
                        </th>
                        <td>
                            {{ $acceleroStation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.acceleroStation.fields.batch_version') }}
                        </th>
                        <td>
                            {{ $acceleroStation->batch_version }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.acceleroStation.fields.serial_number') }}
                        </th>
                        <td>
                            {{ $acceleroStation->serial_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.acceleroStation.fields.station_id') }}
                        </th>
                        <td>
                            {{ $acceleroStation->station_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.acceleroStation.fields.station_name') }}
                        </th>
                        <td>
                            {{ $acceleroStation->station_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.acceleroStation.fields.network_code') }}
                        </th>
                        <td>
                            {{ $acceleroStation->network_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.acceleroStation.fields.alt') }}
                        </th>
                        <td>
                            {{ $acceleroStation->alt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.acceleroStation.fields.lng') }}
                        </th>
                        <td>
                            {{ $acceleroStation->lng }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.acceleroStation.fields.lat') }}
                        </th>
                        <td>
                            {{ $acceleroStation->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.acceleroStation.fields.digitizer') }}
                        </th>
                        <td>
                            {{ $acceleroStation->digitizer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.acceleroStation.fields.sensor') }}
                        </th>
                        <td>
                            {{ $acceleroStation->sensor }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.accelero-stations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
