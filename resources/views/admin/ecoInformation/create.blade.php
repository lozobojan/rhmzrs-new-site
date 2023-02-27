@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.ecoInformation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.eco-information.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="batch_version">{{ trans('cruds.ecoInformation.fields.batch_version') }}</label>
                <input class="form-control {{ $errors->has('batch_version') ? 'is-invalid' : '' }}" type="text" name="batch_version" id="batch_version" value="{{ old('batch_version', '') }}" required>
                @if($errors->has('batch_version'))
                    <span class="text-danger">{{ $errors->first('batch_version') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.batch_version_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="station_id">{{ trans('cruds.ecoInformation.fields.station_id') }}</label>
                <input class="form-control {{ $errors->has('station_id') ? 'is-invalid' : '' }}" type="text" name="station_id" id="station_id" value="{{ old('station_id', '') }}">
                @if($errors->has('station_id'))
                    <span class="text-danger">{{ $errors->first('station_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.station_id_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="station_name">{{ trans('cruds.ecoInformation.fields.station_name') }}</label>
                <input class="form-control {{ $errors->has('station_name') ? 'is-invalid' : '' }}" type="text" name="station_name" id="station_name" value="{{ old('station_name', '') }}" required>
                @if($errors->has('station_name'))
                    <span class="text-danger">{{ $errors->first('station_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.station_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="alt">{{ trans('cruds.ecoInformation.fields.alt') }}</label>
                <input class="form-control {{ $errors->has('alt') ? 'is-invalid' : '' }}" type="text" name="alt" id="alt" value="{{ old('alt', '') }}" required>
                @if($errors->has('alt'))
                    <span class="text-danger">{{ $errors->first('alt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.alt_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lng">{{ trans('cruds.ecoInformation.fields.lng') }}</label>
                <input class="form-control {{ $errors->has('lng') ? 'is-invalid' : '' }}" type="text" name="lng" id="lng" value="{{ old('lng', '') }}" required>
                @if($errors->has('lng'))
                    <span class="text-danger">{{ $errors->first('lng') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.lng_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lat">{{ trans('cruds.ecoInformation.fields.lat') }}</label>
                <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="text" name="lat" id="lat" value="{{ old('lat', '') }}" required>
                @if($errors->has('lat'))
                    <span class="text-danger">{{ $errors->first('lat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.lat_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="period">{{ trans('cruds.ecoInformation.fields.period') }}</label>
                <input class="form-control {{ $errors->has('period') ? 'is-invalid' : '' }}" type="text" name="period"
                       id="period" value="{{ old('period', '') }}" required>
                @if($errors->has('period'))
                    <span class="text-danger">{{ $errors->first('period') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.period_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="temperature">{{ trans('cruds.ecoInformation.fields.temperature') }}</label>
                <input class="form-control {{ $errors->has('temperature') ? 'is-invalid' : '' }}" type="text" name="temperature"
                       id="temperature" value="{{ old('temperature', '') }}" required>
                @if($errors->has('temperature'))
                    <span class="text-danger">{{ $errors->first('temperature') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.temperature_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="humidity">{{ trans('cruds.ecoInformation.fields.humidity') }}</label>
                <input class="form-control {{ $errors->has('humidity') ? 'is-invalid' : '' }}" type="text" name="humidity"
                       id="humidity" value="{{ old('humidity', '') }}" required>
                @if($errors->has('humidity'))
                    <span class="text-danger">{{ $errors->first('humidity') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.humidity_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="pressure">{{ trans('cruds.ecoInformation.fields.pressure') }}</label>
                <input class="form-control {{ $errors->has('pressure') ? 'is-invalid' : '' }}" type="text" name="pressure"
                       id="pressure" value="{{ old('pressure', '') }}" required>
                @if($errors->has('pressure'))
                    <span class="text-danger">{{ $errors->first('pressure') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.pressure_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="solar_radiation">{{ trans('cruds.ecoInformation.fields.solar_radiation') }}</label>
                <input class="form-control {{ $errors->has('solar_radiation') ? 'is-invalid' : '' }}" type="text" name="solar_radiation"
                       id="solar_radiation" value="{{ old('solar_radiation', '') }}" required>
                @if($errors->has('solar_radiation'))
                    <span class="text-danger">{{ $errors->first('solar_radiation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.solar_radiation_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="rainfall">{{ trans('cruds.ecoInformation.fields.rainfall') }}</label>
                <input class="form-control {{ $errors->has('rainfall') ? 'is-invalid' : '' }}" type="text" name="rainfall"
                       id="rainfall" value="{{ old('rainfall', '') }}" required>
                @if($errors->has('rainfall'))
                    <span class="text-danger">{{ $errors->first('rainfall') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.rainfall_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="wind_speed">{{ trans('cruds.ecoInformation.fields.wind_speed') }}</label>
                <input class="form-control {{ $errors->has('wind_speed') ? 'is-invalid' : '' }}" type="text" name="wind_speed"
                       id="wind_speed" value="{{ old('wind_speed', '') }}" required>
                @if($errors->has('wind_speed'))
                    <span class="text-danger">{{ $errors->first('wind_speed') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.wind_speed_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="wind_direction">{{ trans('cruds.ecoInformation.fields.wind_direction') }}</label>
                <input class="form-control {{ $errors->has('wind_direction') ? 'is-invalid' : '' }}" type="text" name="wind_direction"
                       id="wind_direction" value="{{ old('wind_direction','') }}" required>
                @if($errors->has('wind_direction'))
                    <span class="text-danger">{{ $errors->first('wind_direction') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.wind_direction_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="o3">{{ trans('cruds.ecoInformation.fields.o3') }}</label>
                <input class="form-control {{ $errors->has('o3') ? 'is-invalid' : '' }}" type="text" name="o3"
                       id="o3" value="{{ old('o3', '') }}" required>
                @if($errors->has('o3'))
                    <span class="text-danger">{{ $errors->first('o3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.o3_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="o3">{{ trans('cruds.ecoInformation.fields.o3') }}</label>
                <input class="form-control {{ $errors->has('o3') ? 'is-invalid' : '' }}" type="text" name="o3"
                       id="o3" value="{{ old('o3', '') }}" required>
                @if($errors->has('o3'))
                    <span class="text-danger">{{ $errors->first('o3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.o3_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="co">{{ trans('cruds.ecoInformation.fields.co') }}</label>
                <input class="form-control {{ $errors->has('co') ? 'is-invalid' : '' }}" type="text" name="co"
                       id="co" value="{{ old('co', '') }}" required>
                @if($errors->has('co'))
                    <span class="text-danger">{{ $errors->first('co') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.co_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="no2">{{ trans('cruds.ecoInformation.fields.no2') }}</label>
                <input class="form-control {{ $errors->has('no2') ? 'is-invalid' : '' }}" type="text" name="no2"
                       id="no2" value="{{ old('no2', '') }}" required>
                @if($errors->has('no2'))
                    <span class="text-danger">{{ $errors->first('no2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.no2') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="so2">{{ trans('cruds.ecoInformation.fields.so2') }}</label>
                <input class="form-control {{ $errors->has('so2') ? 'is-invalid' : '' }}" type="text" name="so2"
                       id="so2" value="{{ old('so2', '') }}" required>
                @if($errors->has('so2'))
                    <span class="text-danger">{{ $errors->first('so2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.so2') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="nox">{{ trans('cruds.ecoInformation.fields.nox') }}</label>
                <input class="form-control {{ $errors->has('nox') ? 'is-invalid' : '' }}" type="text" name="nox"
                       id="nox" value="{{ old('nox','') }}" required>
                @if($errors->has('nox'))
                    <span class="text-danger">{{ $errors->first('nox') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.nox') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="pm10">{{ trans('cruds.ecoInformation.fields.pm10') }}</label>
                <input class="form-control {{ $errors->has('pm10') ? 'is-invalid' : '' }}" type="text" name="pm10"
                       id="pm10" value="{{ old('pm10', '') }}" required>
                @if($errors->has('pm10'))
                    <span class="text-danger">{{ $errors->first('pm10') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.pm10') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="ik">{{ trans('cruds.ecoInformation.fields.ik') }}</label>
                <input class="form-control {{ $errors->has('ik') ? 'is-invalid' : '' }}" type="text" name="ik"
                       id="ik" value="{{ old('ik', '') }}" required>
                @if($errors->has('ik'))
                    <span class="text-danger">{{ $errors->first('ik') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.ik') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="pm25">{{ trans('cruds.ecoInformation.fields.pm25') }}</label>
                <input class="form-control {{ $errors->has('pm25') ? 'is-invalid' : '' }}" type="text" name="pm25"
                       id="pm25" value="{{ old('pm25', '') }}" required>
                @if($errors->has('pm25'))
                    <span class="text-danger">{{ $errors->first('pm25') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.pm25') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.ecoInformation.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoInformation.fields.description_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.eco-information.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $ecoInformation->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection
