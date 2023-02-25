@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.gasEmission.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gas-emissions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.gasEmission.fields.id') }}
                        </th>
                        <td>
                            {{ $gasEmission->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gasEmission.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\GasEmission::TYPE_SELECT[$gasEmission->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gasEmission.fields.gas') }}
                        </th>
                        <td>
                            {{ $gasEmission->gas }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gasEmission.fields.year') }}
                        </th>
                        <td>
                            {{ $gasEmission->year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gasEmission.fields.value') }}
                        </th>
                        <td>
                            {{ $gasEmission->value }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gas-emissions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection