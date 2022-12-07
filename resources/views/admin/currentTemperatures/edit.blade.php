@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.currentTemperature.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.current-temperatures.update", [$currentTemperature->id]) }}"
                  enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required"
                           for="batch_version">{{ trans('cruds.currentTemperature.fields.batch_version') }}</label>
                    <input class="form-control {{ $errors->has('batch_version') ? 'is-invalid' : '' }}" type="text"
                           name="batch_version" id="batch_version"
                           value="{{ old('batch_version', $currentTemperature->batch_version) }}" required>
                    @if($errors->has('batch_version'))
                        <span class="text-danger">{{ $errors->first('batch_version') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.currentTemperature.fields.batch_version_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="station_id">{{ trans('cruds.currentTemperature.fields.station_id') }}</label>
                    <input class="form-control {{ $errors->has('station_id') ? 'is-invalid' : '' }}" type="text"
                           name="station_id" id="station_id" value="{{ old('station_id', $currentTemperature->station_id) }}">
                    @if($errors->has('station_id'))
                        <span class="text-danger">{{ $errors->first('station_id') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.currentTemperature.fields.station_id_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required"
                           for="station_name">{{ trans('cruds.currentTemperature.fields.station_name') }}</label>
                    <input class="form-control {{ $errors->has('station_name') ? 'is-invalid' : '' }}" type="text"
                           name="station_name" id="station_name"
                           value="{{ old('station_name', $currentTemperature->station_name) }}" required>
                    @if($errors->has('station_name'))
                        <span class="text-danger">{{ $errors->first('station_name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.currentTemperature.fields.station_name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="alt">{{ trans('cruds.currentTemperature.fields.alt') }}</label>
                    <input class="form-control {{ $errors->has('alt') ? 'is-invalid' : '' }}" type="text" name="alt"
                           id="alt" value="{{ old('alt', $currentTemperature->alt) }}" required>
                    @if($errors->has('alt'))
                        <span class="text-danger">{{ $errors->first('alt') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.currentTemperature.fields.alt_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="lng">{{ trans('cruds.currentTemperature.fields.lng') }}</label>
                    <input class="form-control {{ $errors->has('lng') ? 'is-invalid' : '' }}" type="text" name="lng"
                           id="lng" value="{{ old('lng', $currentTemperature->lng) }}" required>
                    @if($errors->has('lng'))
                        <span class="text-danger">{{ $errors->first('lng') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.currentTemperature.fields.lng_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="lat">{{ trans('cruds.currentTemperature.fields.lat') }}</label>
                    <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="text" name="lat"
                           id="lat" value="{{ old('lat', $currentTemperature->lat) }}" required>
                    @if($errors->has('lat'))
                        <span class="text-danger">{{ $errors->first('lat') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.currentTemperature.fields.lat_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required"
                           for="current_temperature">{{ trans('cruds.currentTemperature.fields.current_temperature') }}</label>
                    <input class="form-control {{ $errors->has('current_temperature') ? 'is-invalid' : '' }}"
                           type="text" name="current_temperature" id="current_temperature"
                           value="{{ old('current_temperature', $currentTemperature->current_temperature) }}" required>
                    @if($errors->has('current_temperature'))
                        <span class="text-danger">{{ $errors->first('current_temperature') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.currentTemperature.fields.current_temperature_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="period">{{ trans('cruds.currentTemperature.fields.period') }}</label>
                    <input class="form-control {{ $errors->has('period') ? 'is-invalid' : '' }}" type="text"
                           name="period" id="period" value="{{ old('period', $currentTemperature->period) }}">
                    @if($errors->has('period'))
                        <span class="text-danger">{{ $errors->first('period') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.currentTemperature.fields.period_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="description">{{ trans('cruds.currentTemperature.fields.description') }}</label>
                    <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text"
                           name="description" id="description"
                           value="{{ old('description', $currentTemperature->description) }}">
                    @if($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.currentTemperature.fields.description_helper') }}</span>
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
