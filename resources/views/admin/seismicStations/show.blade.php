@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.floodDefensePoint.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.flood-defense-points.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.floodDefensePoint.fields.id') }}
                        </th>
                        <td>
                            {{ $floodDefensePoint->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.floodDefensePoint.fields.ordinal_number') }}
                        </th>
                        <td>
                            {{ $floodDefensePoint->ordinal_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.floodDefensePoint.fields.place') }}
                        </th>
                        <td>
                            {{ $floodDefensePoint->place }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.floodDefensePoint.fields.river_basin') }}
                        </th>
                        <td>
                            {{ $floodDefensePoint->river_basin->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.floodDefensePoint.fields.ordinary_value') }}
                        </th>
                        <td>
                            {{ $floodDefensePoint->ordinary_value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.floodDefensePoint.fields.extraordinary_value') }}
                        </th>
                        <td>
                            {{ $floodDefensePoint->extraordinary_value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.floodDefensePoint.fields.nnv') }}
                        </th>
                        <td>
                            {{ $floodDefensePoint->nnv }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.floodDefensePoint.fields.vvv') }}
                        </th>
                        <td>
                            {{ $floodDefensePoint->vvv }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.flood-defense-points.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection