@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.hydroInformation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.hydro-informations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="batch_version">{{ trans('cruds.hydroInformation.fields.batch_version') }}</label>
                <input class="form-control {{ $errors->has('batch_version') ? 'is-invalid' : '' }}" type="text" name="batch_version" id="batch_version" value="{{ old('batch_version', '') }}" required>
                @if($errors->has('batch_version'))
                    <span class="text-danger">{{ $errors->first('batch_version') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hydroInformation.fields.batch_version_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="station_id">{{ trans('cruds.hydroInformation.fields.station_id') }}</label>
                <input class="form-control {{ $errors->has('station_id') ? 'is-invalid' : '' }}" type="text" name="station_id" id="station_id" value="{{ old('station_id', '') }}" required>
                @if($errors->has('station_id'))
                    <span class="text-danger">{{ $errors->first('station_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hydroInformation.fields.station_id_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="station_name">{{ trans('cruds.hydroInformation.fields.station_name') }}</label>
                <input class="form-control {{ $errors->has('station_name') ? 'is-invalid' : '' }}" type="text" name="station_name" id="station_name" value="{{ old('station_name', '') }}" required>
                @if($errors->has('station_name'))
                    <span class="text-danger">{{ $errors->first('station_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hydroInformation.fields.station_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="alt">{{ trans('cruds.hydroInformation.fields.alt') }}</label>
                <input class="form-control {{ $errors->has('alt') ? 'is-invalid' : '' }}" type="text" name="alt" id="alt" value="{{ old('alt', '') }}" required>
                @if($errors->has('alt'))
                    <span class="text-danger">{{ $errors->first('alt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hydroInformation.fields.alt_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lng">{{ trans('cruds.hydroInformation.fields.lng') }}</label>
                <input class="form-control {{ $errors->has('lng') ? 'is-invalid' : '' }}" type="text" name="lng" id="lng" value="{{ old('lng', '') }}" required>
                @if($errors->has('lng'))
                    <span class="text-danger">{{ $errors->first('lng') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hydroInformation.fields.lng_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lat">{{ trans('cruds.hydroInformation.fields.lat') }}</label>
                <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="text" name="lat" id="lat" value="{{ old('lat', '') }}" required>
                @if($errors->has('lat'))
                    <span class="text-danger">{{ $errors->first('lat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hydroInformation.fields.lat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="absolute_min">{{ trans('cruds.hydroInformation.fields.absolute_min') }}</label>
                <input class="form-control {{ $errors->has('absolute_min') ? 'is-invalid' : '' }}" type="text" name="absolute_min" id="absolute_min" value="{{ old('absolute_min', '') }}">
                @if($errors->has('absolute_min'))
                    <span class="text-danger">{{ $errors->first('absolute_min') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hydroInformation.fields.absolute_min_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="absolute_min_date">{{ trans('cruds.hydroInformation.fields.absolute_min_date') }}</label>
                <input class="form-control {{ $errors->has('absolute_min_date') ? 'is-invalid' : '' }}" type="text" name="absolute_min_date" id="absolute_min_date" value="{{ old('absolute_min_date', '') }}">
                @if($errors->has('absolute_min_date'))
                    <span class="text-danger">{{ $errors->first('absolute_min_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hydroInformation.fields.absolute_min_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="absolute_max">{{ trans('cruds.hydroInformation.fields.absolute_max') }}</label>
                <input class="form-control {{ $errors->has('absolute_max') ? 'is-invalid' : '' }}" type="text" name="absolute_max" id="absolute_max" value="{{ old('absolute_max', '') }}">
                @if($errors->has('absolute_max'))
                    <span class="text-danger">{{ $errors->first('absolute_max') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hydroInformation.fields.absolute_max_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="absolute_max_date">{{ trans('cruds.hydroInformation.fields.absolute_max_date') }}</label>
                <input class="form-control {{ $errors->has('absolute_max_date') ? 'is-invalid' : '' }}" type="text" name="absolute_max_date" id="absolute_max_date" value="{{ old('absolute_max_date', '') }}">
                @if($errors->has('absolute_max_date'))
                    <span class="text-danger">{{ $errors->first('absolute_max_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hydroInformation.fields.absolute_max_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="regular_elevation">{{ trans('cruds.hydroInformation.fields.regular_elevation') }}</label>
                <input class="form-control {{ $errors->has('regular_elevation') ? 'is-invalid' : '' }}" type="text" name="regular_elevation" id="regular_elevation" value="{{ old('regular_elevation', '') }}">
                @if($errors->has('regular_elevation'))
                    <span class="text-danger">{{ $errors->first('regular_elevation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hydroInformation.fields.regular_elevation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="irregular_elevation">{{ trans('cruds.hydroInformation.fields.irregular_elevation') }}</label>
                <input class="form-control {{ $errors->has('irregular_elevation') ? 'is-invalid' : '' }}" type="text" name="irregular_elevation" id="irregular_elevation" value="{{ old('irregular_elevation', '') }}">
                @if($errors->has('irregular_elevation'))
                    <span class="text-danger">{{ $errors->first('irregular_elevation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hydroInformation.fields.irregular_elevation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="about">{{ trans('cruds.hydroInformation.fields.about') }}</label>
                <input class="form-control {{ $errors->has('about') ? 'is-invalid' : '' }}" type="text" name="about" id="about" value="{{ old('about', '') }}">
                @if($errors->has('about'))
                    <span class="text-danger">{{ $errors->first('about') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hydroInformation.fields.about_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="period">{{ trans('cruds.hydroInformation.fields.period') }}</label>
                <input class="form-control {{ $errors->has('period') ? 'is-invalid' : '' }}" type="text" name="period" id="period" value="{{ old('period', '') }}">
                @if($errors->has('period'))
                    <span class="text-danger">{{ $errors->first('period') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hydroInformation.fields.period_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="water_level">{{ trans('cruds.hydroInformation.fields.water_level') }}</label>
                <input class="form-control {{ $errors->has('water_level') ? 'is-invalid' : '' }}" type="text" name="water_level" id="water_level" value="{{ old('water_level', '') }}">
                @if($errors->has('water_level'))
                    <span class="text-danger">{{ $errors->first('water_level') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hydroInformation.fields.water_level_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="temperature">{{ trans('cruds.hydroInformation.fields.temperature') }}</label>
                <input class="form-control {{ $errors->has('temperature') ? 'is-invalid' : '' }}" type="text" name="temperature" id="temperature" value="{{ old('temperature', '') }}">
                @if($errors->has('temperature'))
                    <span class="text-danger">{{ $errors->first('temperature') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hydroInformation.fields.temperature_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.hydroInformation.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hydroInformation.fields.description_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.hydro-informations.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $hydroInformation->id ?? 0 }}');
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
