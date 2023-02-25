@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.ecoStation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.eco-stations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ecoStation.fields.id') }}
                        </th>
                        <td>
                            {{ $ecoStation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ecoStation.fields.batch_version') }}
                        </th>
                        <td>
                            {{ $ecoStation->batch_version }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ecoStation.fields.station_id') }}
                        </th>
                        <td>
                            {{ $ecoStation->station_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ecoStation.fields.station_name') }}
                        </th>
                        <td>
                            {{ $ecoStation->station_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ecoStation.fields.alt') }}
                        </th>
                        <td>
                            {{ $ecoStation->alt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ecoStation.fields.lng') }}
                        </th>
                        <td>
                            {{ $ecoStation->lng }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ecoStation.fields.lat') }}
                        </th>
                        <td>
                            {{ $ecoStation->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ecoStation.fields.description') }}
                        </th>
                        <td>
                            {!! $ecoStation->description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.eco-stations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
