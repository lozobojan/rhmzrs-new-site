@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.earthquake.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.earthquakes.update", [$earthquake->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="batch_version">{{ trans('cruds.earthquake.fields.batch_version') }}</label>
                <input class="form-control {{ $errors->has('batch_version') ? 'is-invalid' : '' }}" type="text" name="batch_version" id="batch_version" value="{{ old('batch_version', $earthquake->batch_version) }}">
                @if($errors->has('batch_version'))
                    <span class="text-danger">{{ $errors->first('batch_version') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.earthquake.fields.batch_version_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.earthquake.fields.earthquake_type') }}</label>
                <select class="form-control {{ $errors->has('earthquake_type') ? 'is-invalid' : '' }}" name="earthquake_type" id="earthquake_type" required>
                    <option value disabled {{ old('earthquake_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Earthquake::EARTHQUAKE_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('earthquake_type', $earthquake->earthquake_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('earthquake_type'))
                    <span class="text-danger">{{ $errors->first('earthquake_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.earthquake.fields.earthquake_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.earthquake.fields.publish_status') }}</label>
                <select class="form-control {{ $errors->has('publish_status') ? 'is-invalid' : '' }}" name="publish_status" id="publish_status">
                    <option value disabled {{ old('publish_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Earthquake::PUBLISH_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('publish_status', $earthquake->publish_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('publish_status'))
                    <span class="text-danger">{{ $errors->first('publish_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.earthquake.fields.publish_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="earthquake_date">{{ trans('cruds.earthquake.fields.earthquake_date') }}</label>
                <input class="form-control date {{ $errors->has('earthquake_date') ? 'is-invalid' : '' }}" type="text" name="earthquake_date" id="earthquake_date" value="{{ old('earthquake_date', $earthquake->earthquake_date) }}">
                @if($errors->has('earthquake_date'))
                    <span class="text-danger">{{ $errors->first('earthquake_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.earthquake.fields.earthquake_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="earthquake_time">{{ trans('cruds.earthquake.fields.earthquake_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('earthquake_time') ? 'is-invalid' : '' }}" type="text" name="earthquake_time" id="earthquake_time" value="{{ old('earthquake_time', $earthquake->earthquake_time) }}">
                @if($errors->has('earthquake_time'))
                    <span class="text-danger">{{ $errors->first('earthquake_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.earthquake.fields.earthquake_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lat">{{ trans('cruds.earthquake.fields.lat') }}</label>
                <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="text" name="lat" id="lat" value="{{ old('lat', $earthquake->lat) }}">
                @if($errors->has('lat'))
                    <span class="text-danger">{{ $errors->first('lat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.earthquake.fields.lat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lng">{{ trans('cruds.earthquake.fields.long') }}</label>
                <input class="form-control {{ $errors->has('lng') ? 'is-invalid' : '' }}" type="text" name="lng" id="lng" value="{{ old('lng', $earthquake->lng) }}">
                @if($errors->has('lng'))
                    <span class="text-danger">{{ $errors->first('lng') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.earthquake.fields.long_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="depth">{{ trans('cruds.earthquake.fields.depth') }}</label>
                <input class="form-control {{ $errors->has('depth') ? 'is-invalid' : '' }}" type="text" name="depth" id="depth" value="{{ old('depth', $earthquake->depth) }}">
                @if($errors->has('depth'))
                    <span class="text-danger">{{ $errors->first('depth') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.earthquake.fields.depth_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="magnitude">{{ trans('cruds.earthquake.fields.magnitude') }}</label>
                <input class="form-control {{ $errors->has('magnitude') ? 'is-invalid' : '' }}" type="text" name="magnitude" id="magnitude" value="{{ old('magnitude', $earthquake->magnitude) }}">
                @if($errors->has('magnitude'))
                    <span class="text-danger">{{ $errors->first('magnitude') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.earthquake.fields.magnitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="place">{{ trans('cruds.earthquake.fields.place') }}</label>
                <input class="form-control {{ $errors->has('place') ? 'is-invalid' : '' }}" type="text" name="place" id="place" value="{{ old('place', $earthquake->place) }}">
                @if($errors->has('place'))
                    <span class="text-danger">{{ $errors->first('place') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.earthquake.fields.place_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="municipality">{{ trans('cruds.earthquake.fields.municipality') }}</label>
                <input class="form-control {{ $errors->has('municipality') ? 'is-invalid' : '' }}" type="text" name="municipality" id="municipality" value="{{ old('municipality', $earthquake->municipality) }}">
                @if($errors->has('municipality'))
                    <span class="text-danger">{{ $errors->first('municipality') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.earthquake.fields.municipality_helper') }}</span>
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
