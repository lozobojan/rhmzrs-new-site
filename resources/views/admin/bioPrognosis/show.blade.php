@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.bioPrognosi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bio-prognosis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.bioPrognosi.fields.id') }}
                        </th>
                        <td>
                            {{ $bioPrognosi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bioPrognosi.fields.batch_version') }}
                        </th>
                        <td>
                            {{ $bioPrognosi->batch_version }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bioPrognosi.fields.station_id') }}
                        </th>
                        <td>
                            {{ $bioPrognosi->station_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bioPrognosi.fields.station_name') }}
                        </th>
                        <td>
                            {{ $bioPrognosi->station_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bioPrognosi.fields.alt') }}
                        </th>
                        <td>
                            {{ $bioPrognosi->alt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bioPrognosi.fields.lng') }}
                        </th>
                        <td>
                            {{ $bioPrognosi->lng }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bioPrognosi.fields.lat') }}
                        </th>
                        <td>
                            {{ $bioPrognosi->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.bioPrognosi.fields.value') }}
                        </th>
                        <td>
                            {{ $bioPrognosi->value }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.bio-prognosis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
