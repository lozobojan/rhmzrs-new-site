@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.seismicStation.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.seismic-station.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.seismicStation.fields.id') }}
                        </th>
                        <td>
                            {{ $seismicStation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.seismicStation.fields.batch_version') }}
                        </th>
                        <td>
                            {{ $seismicStation->batch_version }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.seismicStation.fields.description') }}
                        </th>
                        <td>
                            {!! $seismicStation->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.seismicStation.fields.station_name') }}
                        </th>
                        <td>
                            {{ $seismicStation->station_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.seismicStation.fields.station_id') }}
                        </th>
                        <td>
                            {{ $seismicStation->station_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.seismicStation.fields.alt') }}
                        </th>
                        <td>
                            {{ $seismicStation->alt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.seismicStation.fields.lng') }}
                        </th>
                        <td>
                            {{ $seismicStation->lng }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.seismicStation.fields.lat') }}
                        </th>
                        <td>
                            {{ $seismicStation->lat }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.seismic-station.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
