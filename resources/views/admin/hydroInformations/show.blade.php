@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hydroInformation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hydro-informations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.id') }}
                        </th>
                        <td>
                            {{ $hydroInformation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.batch_version') }}
                        </th>
                        <td>
                            {{ $hydroInformation->batch_version }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.station_id') }}
                        </th>
                        <td>
                            {{ $hydroInformation->station_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.station_name') }}
                        </th>
                        <td>
                            {{ $hydroInformation->station_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.alt') }}
                        </th>
                        <td>
                            {{ $hydroInformation->alt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.lng') }}
                        </th>
                        <td>
                            {{ $hydroInformation->lng }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.lat') }}
                        </th>
                        <td>
                            {{ $hydroInformation->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.absolute_min') }}
                        </th>
                        <td>
                            {{ $hydroInformation->absolute_min }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.absolute_min_date') }}
                        </th>
                        <td>
                            {{ $hydroInformation->absolute_min_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.absolute_max') }}
                        </th>
                        <td>
                            {{ $hydroInformation->absolute_max }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.absolute_max_date') }}
                        </th>
                        <td>
                            {{ $hydroInformation->absolute_max_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.regular_elevation') }}
                        </th>
                        <td>
                            {{ $hydroInformation->regular_elevation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.irregular_elevation') }}
                        </th>
                        <td>
                            {{ $hydroInformation->irregular_elevation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.about') }}
                        </th>
                        <td>
                            {{ $hydroInformation->about }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.period') }}
                        </th>
                        <td>
                            {{ $hydroInformation->period }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.water_level') }}
                        </th>
                        <td>
                            {{ $hydroInformation->water_level }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.temperature') }}
                        </th>
                        <td>
                            {{ $hydroInformation->temperature }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.description') }}
                        </th>
                        <td>
                            {!! $hydroInformation->description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hydro-informations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
