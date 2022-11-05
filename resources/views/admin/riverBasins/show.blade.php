@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.riverBasin.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.river-basins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.riverBasin.fields.id') }}
                        </th>
                        <td>
                            {{ $riverBasin->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riverBasin.fields.title') }}
                        </th>
                        <td>
                            {{ $riverBasin->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riverBasin.fields.description') }}
                        </th>
                        <td>
                            {!! $riverBasin->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.riverBasin.fields.photo') }}
                        </th>
                        <td>
                            @if($riverBasin->photo)
                                <a href="{{ $riverBasin->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $riverBasin->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.river-basins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection