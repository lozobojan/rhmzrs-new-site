@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.bioPrognosi.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.bio-prognosis.update", [$bioPrognosi->id]) }}"
                  enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required"
                           for="batch_version">{{ trans('cruds.bioPrognosi.fields.batch_version') }}</label>
                    <input class="form-control {{ $errors->has('batch_version') ? 'is-invalid' : '' }}" type="text"
                           name="batch_version" id="batch_version"
                           value="{{ old('batch_version', $bioPrognosi->batch_version) }}" required>
                    @if($errors->has('batch_version'))
                        <span class="text-danger">{{ $errors->first('batch_version') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.bioPrognosi.fields.batch_version_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="station_id">{{ trans('cruds.bioPrognosi.fields.station_id') }}</label>
                    <input class="form-control {{ $errors->has('station_id') ? 'is-invalid' : '' }}" type="text"
                           name="station_id" id="station_id" value="{{ old('station_id', $bioPrognosi->station_id) }}" required>
                    @if($errors->has('station_id'))
                        <span class="text-danger">{{ $errors->first('station_id') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.bioPrognosi.fields.station_id_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required"
                           for="station_name">{{ trans('cruds.bioPrognosi.fields.station_name') }}</label>
                    <input class="form-control {{ $errors->has('station_name') ? 'is-invalid' : '' }}" type="text"
                           name="station_name" id="station_name"
                           value="{{ old('station_name', $bioPrognosi->station_name) }}" required>
                    @if($errors->has('station_name'))
                        <span class="text-danger">{{ $errors->first('station_name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.bioPrognosi.fields.station_name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="alt">{{ trans('cruds.bioPrognosi.fields.alt') }}</label>
                    <input class="form-control {{ $errors->has('alt') ? 'is-invalid' : '' }}" type="text" name="alt"
                           id="alt" value="{{ old('alt', $bioPrognosi->alt) }}" required>
                    @if($errors->has('alt'))
                        <span class="text-danger">{{ $errors->first('alt') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.bioPrognosi.fields.alt_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="lng">{{ trans('cruds.bioPrognosi.fields.lng') }}</label>
                    <input class="form-control {{ $errors->has('lng') ? 'is-invalid' : '' }}" type="text" name="lng"
                           id="lng" value="{{ old('lng', $bioPrognosi->lng) }}" required>
                    @if($errors->has('lng'))
                        <span class="text-danger">{{ $errors->first('lng') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.bioPrognosi.fields.lng_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="lat">{{ trans('cruds.bioPrognosi.fields.lat') }}</label>
                    <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="text" name="lat"
                           id="lat" value="{{ old('lat', $bioPrognosi->lat) }}" required>
                    @if($errors->has('lat'))
                        <span class="text-danger">{{ $errors->first('lat') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.bioPrognosi.fields.lat_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="value">{{ trans('cruds.bioPrognosi.fields.value') }}</label>
                    <input class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" type="text" name="value"
                           id="value" value="{{ old('value', $bioPrognosi->value) }}">
                    @if($errors->has('value'))
                        <span class="text-danger">{{ $errors->first('value') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.bioPrognosi.fields.value_helper') }}</span>
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
