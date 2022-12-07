@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.wind.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.winds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.wind.fields.id') }}
                        </th>
                        <td>
                            {{ $wind->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.wind.fields.batch_version') }}
                        </th>
                        <td>
                            {{ $wind->batch_version }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.wind.fields.station_id') }}
                        </th>
                        <td>
                            {{ $wind->station_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.wind.fields.station_name') }}
                        </th>
                        <td>
                            {{ $wind->station_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.wind.fields.alt') }}
                        </th>
                        <td>
                            {{ $wind->alt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.wind.fields.lng') }}
                        </th>
                        <td>
                            {{ $wind->lng }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.wind.fields.lat') }}
                        </th>
                        <td>
                            {{ $wind->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.wind.fields.wind_speed') }}
                        </th>
                        <td>
                            {{ $wind->wind_speed }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.wind.fields.lat_direction') }}
                        </th>
                        <td>
                            {{ $wind->lat_direction }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.wind.fields.cir_direction') }}
                        </th>
                        <td>
                            {{ $wind->cir_direction }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.wind.fields.period') }}
                        </th>
                        <td>
                            {{ $wind->period }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.wind.fields.description') }}
                        </th>
                        <td>
                            {!! $wind->description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.winds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
