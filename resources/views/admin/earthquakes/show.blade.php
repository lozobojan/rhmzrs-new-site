@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.earthquake.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.earthquakes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.earthquake.fields.id') }}
                        </th>
                        <td>
                            {{ $earthquake->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earthquake.fields.batch_version') }}
                        </th>
                        <td>
                            {{ $earthquake->batch_version }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earthquake.fields.earthquake_type') }}
                        </th>
                        <td>
                            {{ App\Models\Earthquake::EARTHQUAKE_TYPE_SELECT[$earthquake->earthquake_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earthquake.fields.publish_status') }}
                        </th>
                        <td>
                            {{ App\Models\Earthquake::PUBLISH_STATUS_SELECT[$earthquake->publish_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earthquake.fields.earthquake_date') }}
                        </th>
                        <td>
                            {{ $earthquake->earthquake_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earthquake.fields.earthquake_time') }}
                        </th>
                        <td>
                            {{ $earthquake->earthquake_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earthquake.fields.lat') }}
                        </th>
                        <td>
                            {{ $earthquake->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earthquake.fields.long') }}
                        </th>
                        <td>
                            {{ $earthquake->lng }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earthquake.fields.depth') }}
                        </th>
                        <td>
                            {{ $earthquake->depth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earthquake.fields.magnitude') }}
                        </th>
                        <td>
                            {{ $earthquake->magnitude }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earthquake.fields.place') }}
                        </th>
                        <td>
                            {{ $earthquake->place }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.earthquake.fields.municipality') }}
                        </th>
                        <td>
                            {{ $earthquake->municipality }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.earthquakes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
