@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.acceleroStation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.accelero-stations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="batch_version">{{ trans('cruds.acceleroStation.fields.batch_version') }}</label>
                <input class="form-control {{ $errors->has('batch_version') ? 'is-invalid' : '' }}" type="text" name="batch_version" id="batch_version" value="{{ old('batch_version', '') }}" required>
                @if($errors->has('batch_version'))
                    <span class="text-danger">{{ $errors->first('batch_version') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.acceleroStation.fields.batch_version_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="serial_number">{{ trans('cruds.acceleroStation.fields.serial_number') }}</label>
                <input class="form-control {{ $errors->has('serial_number') ? 'is-invalid' : '' }}" type="text" name="serial_number" id="serial_number" value="{{ old('serial_number', '') }}">
                @if($errors->has('serial_number'))
                    <span class="text-danger">{{ $errors->first('serial_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.acceleroStation.fields.serial_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="station_id">{{ trans('cruds.acceleroStation.fields.station_id') }}</label>
                <input class="form-control {{ $errors->has('station_id') ? 'is-invalid' : '' }}" type="text" name="station_id" id="station_id" value="{{ old('station_id', '') }}" required>
                @if($errors->has('station_id'))
                    <span class="text-danger">{{ $errors->first('station_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.acceleroStation.fields.station_id_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="station_name">{{ trans('cruds.acceleroStation.fields.station_name') }}</label>
                <input class="form-control {{ $errors->has('station_name') ? 'is-invalid' : '' }}" type="text" name="station_name" id="station_name" value="{{ old('station_name', '') }}" required>
                @if($errors->has('station_name'))
                    <span class="text-danger">{{ $errors->first('station_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.acceleroStation.fields.station_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="network_code">{{ trans('cruds.acceleroStation.fields.network_code') }}</label>
                <input class="form-control {{ $errors->has('network_code') ? 'is-invalid' : '' }}" type="text" name="network_code" id="network_code" value="{{ old('network_code', '') }}">
                @if($errors->has('network_code'))
                    <span class="text-danger">{{ $errors->first('network_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.acceleroStation.fields.network_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="alt">{{ trans('cruds.acceleroStation.fields.alt') }}</label>
                <input class="form-control {{ $errors->has('alt') ? 'is-invalid' : '' }}" type="text" name="alt" id="alt" value="{{ old('alt', '') }}" required>
                @if($errors->has('alt'))
                    <span class="text-danger">{{ $errors->first('alt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.acceleroStation.fields.alt_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lng">{{ trans('cruds.acceleroStation.fields.lng') }}</label>
                <input class="form-control {{ $errors->has('lng') ? 'is-invalid' : '' }}" type="text" name="lng" id="lng" value="{{ old('lng', '') }}" required>
                @if($errors->has('lng'))
                    <span class="text-danger">{{ $errors->first('lng') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.acceleroStation.fields.lng_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lat">{{ trans('cruds.acceleroStation.fields.lat') }}</label>
                <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="text" name="lat" id="lat" value="{{ old('lat', '') }}" required>
                @if($errors->has('lat'))
                    <span class="text-danger">{{ $errors->first('lat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.acceleroStation.fields.lat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="digitizer">{{ trans('cruds.acceleroStation.fields.digitizer') }}</label>
                <input class="form-control {{ $errors->has('digitizer') ? 'is-invalid' : '' }}" type="text" name="digitizer" id="digitizer" value="{{ old('digitizer', '') }}">
                @if($errors->has('digitizer'))
                    <span class="text-danger">{{ $errors->first('digitizer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.acceleroStation.fields.digitizer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sensor">{{ trans('cruds.acceleroStation.fields.sensor') }}</label>
                <input class="form-control {{ $errors->has('sensor') ? 'is-invalid' : '' }}" type="text" name="sensor" id="sensor" value="{{ old('sensor', '') }}">
                @if($errors->has('sensor'))
                    <span class="text-danger">{{ $errors->first('sensor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.acceleroStation.fields.sensor_helper') }}</span>
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
