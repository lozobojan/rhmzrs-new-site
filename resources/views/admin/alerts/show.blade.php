@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.alert.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.alerts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.alert.fields.id') }}
                        </th>
                        <td>
                            {{ $alert->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alert.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $alert->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alert.fields.title') }}
                        </th>
                        <td>
                            {{ $alert->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alert.fields.level.level') }}
                        </th>
                        <td>
                            {{ $alert->level_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alert.fields.description') }}
                        </th>
                        <td>
                            {!! $alert->description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.alerts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
