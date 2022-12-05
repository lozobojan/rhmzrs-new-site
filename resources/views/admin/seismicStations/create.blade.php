@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.floodDefensePoint.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.flood-defense-points.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="ordinal_number">{{ trans('cruds.floodDefensePoint.fields.ordinal_number') }}</label>
                <input class="form-control {{ $errors->has('ordinal_number') ? 'is-invalid' : '' }}" type="number" name="ordinal_number" id="ordinal_number" value="{{ old('ordinal_number', '1') }}" step="1" required>
                @if($errors->has('ordinal_number'))
                    <span class="text-danger">{{ $errors->first('ordinal_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.floodDefensePoint.fields.ordinal_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="place">{{ trans('cruds.floodDefensePoint.fields.place') }}</label>
                <input class="form-control {{ $errors->has('place') ? 'is-invalid' : '' }}" type="text" name="place" id="place" value="{{ old('place', '') }}" required>
                @if($errors->has('place'))
                    <span class="text-danger">{{ $errors->first('place') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.floodDefensePoint.fields.place_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="river_basin_id">{{ trans('cruds.floodDefensePoint.fields.river_basin') }}</label>
                <select class="form-control select2 {{ $errors->has('river_basin') ? 'is-invalid' : '' }}" name="river_basin_id" id="river_basin_id" required>
                    @foreach($river_basins as $id => $entry)
                        <option value="{{ $id }}" {{ old('river_basin_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('river_basin'))
                    <span class="text-danger">{{ $errors->first('river_basin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.floodDefensePoint.fields.river_basin_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ordinary_value">{{ trans('cruds.floodDefensePoint.fields.ordinary_value') }}</label>
                <input class="form-control {{ $errors->has('ordinary_value') ? 'is-invalid' : '' }}" type="number" name="ordinary_value" id="ordinary_value" value="{{ old('ordinary_value', '') }}" step="1" required>
                @if($errors->has('ordinary_value'))
                    <span class="text-danger">{{ $errors->first('ordinary_value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.floodDefensePoint.fields.ordinary_value_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="extraordinary_value">{{ trans('cruds.floodDefensePoint.fields.extraordinary_value') }}</label>
                <input class="form-control {{ $errors->has('extraordinary_value') ? 'is-invalid' : '' }}" type="number" name="extraordinary_value" id="extraordinary_value" value="{{ old('extraordinary_value', '') }}" step="1" required>
                @if($errors->has('extraordinary_value'))
                    <span class="text-danger">{{ $errors->first('extraordinary_value') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.floodDefensePoint.fields.extraordinary_value_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nnv">{{ trans('cruds.floodDefensePoint.fields.nnv') }}</label>
                <input class="form-control {{ $errors->has('nnv') ? 'is-invalid' : '' }}" type="text" name="nnv" id="nnv" value="{{ old('nnv', '') }}">
                @if($errors->has('nnv'))
                    <span class="text-danger">{{ $errors->first('nnv') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.floodDefensePoint.fields.nnv_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vvv">{{ trans('cruds.floodDefensePoint.fields.vvv') }}</label>
                <input class="form-control {{ $errors->has('vvv') ? 'is-invalid' : '' }}" type="text" name="vvv" id="vvv" value="{{ old('vvv', '') }}">
                @if($errors->has('vvv'))
                    <span class="text-danger">{{ $errors->first('vvv') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.floodDefensePoint.fields.vvv_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection