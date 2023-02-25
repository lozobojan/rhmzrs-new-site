@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.meteoMap.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.meteo-maps.update", [$meteoMap->id]) }}"
                  enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required"
                           for="batch_version">{{ trans('cruds.meteoMap.fields.batch_version') }}</label>
                    <input class="form-control {{ $errors->has('batch_version') ? 'is-invalid' : '' }}" type="text"
                           name="batch_version" id="batch_version"
                           value="{{ old('batch_version', $meteoMap->batch_version) }}" required>
                    @if($errors->has('batch_version'))
                        <span class="text-danger">{{ $errors->first('batch_version') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.meteoMap.fields.batch_version_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="station_name">{{ trans('cruds.meteoMap.fields.station_name') }}</label>
                    <input class="form-control {{ $errors->has('station_name') ? 'is-invalid' : '' }}" type="text"
                           name="station_name" id="station_name"
                           value="{{ old('station_name', $meteoMap->station_name) }}">
                    @if($errors->has('station_name'))
                        <span class="text-danger">{{ $errors->first('station_name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.meteoMap.fields.station_name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="alt">{{ trans('cruds.meteoMap.fields.alt') }}</label>
                    <input class="form-control {{ $errors->has('alt') ? 'is-invalid' : '' }}" type="text" name="alt"
                           id="alt" value="{{ old('alt', $meteoMap->alt) }}" required>
                    @if($errors->has('alt'))
                        <span class="text-danger">{{ $errors->first('alt') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.meteoMap.fields.alt_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="lng">{{ trans('cruds.meteoMap.fields.lng') }}</label>
                    <input class="form-control {{ $errors->has('lng') ? 'is-invalid' : '' }}" type="text" name="lng"
                           id="lng" value="{{ old('lng', $meteoMap->lng) }}" required>
                    @if($errors->has('lng'))
                        <span class="text-danger">{{ $errors->first('lng') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.meteoMap.fields.lng_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="lat">{{ trans('cruds.meteoMap.fields.lat') }}</label>
                    <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="text" name="lat"
                           id="lat" value="{{ old('lat', $meteoMap->lat) }}" required>
                    @if($errors->has('lat'))
                        <span class="text-danger">{{ $errors->first('lat') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.meteoMap.fields.lat_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="temperature">{{ trans('cruds.meteoMap.fields.temperature') }}</label>
                    <input class="form-control {{ $errors->has('temperature') ? 'is-invalid' : '' }}" type="text"
                           name="temperature" id="temperature" value="{{ old('temperature', $meteoMap->temperature) }}">
                    @if($errors->has('temperature'))
                        <span class="text-danger">{{ $errors->first('temperature') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.meteoMap.fields.temperature_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="pressure">{{ trans('cruds.meteoMap.fields.pressure') }}</label>
                    <input class="form-control {{ $errors->has('pressure') ? 'is-invalid' : '' }}" type="text"
                           name="pressure" id="pressure" value="{{ old('pressure', $meteoMap->pressure) }}">
                    @if($errors->has('pressure'))
                        <span class="text-danger">{{ $errors->first('pressure') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.meteoMap.fields.pressure_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="wind_speed">{{ trans('cruds.meteoMap.fields.wind_speed') }}</label>
                    <input class="form-control {{ $errors->has('wind_speed') ? 'is-invalid' : '' }}" type="text"
                           name="wind_speed" id="wind_speed" value="{{ old('wind_speed', $meteoMap->wind_speed) }}">
                    @if($errors->has('wind_speed'))
                        <span class="text-danger">{{ $errors->first('wind_speed') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.meteoMap.fields.wind_speed_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="lat_direction">{{ trans('cruds.meteoMap.fields.lat_direction') }}</label>
                    <input class="form-control {{ $errors->has('lat_direction') ? 'is-invalid' : '' }}" type="text"
                           name="lat_direction" id="lat_direction"
                           value="{{ old('lat_direction', $meteoMap->lat_direction) }}">
                    @if($errors->has('lat_direction'))
                        <span class="text-danger">{{ $errors->first('lat_direction') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.meteoMap.fields.lat_direction_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="cir_direction">{{ trans('cruds.meteoMap.fields.cir_direction') }}</label>
                    <input class="form-control {{ $errors->has('cir_direction') ? 'is-invalid' : '' }}" type="text"
                           name="cir_direction" id="cir_direction"
                           value="{{ old('cir_direction', $meteoMap->cir_direction) }}">
                    @if($errors->has('cir_direction'))
                        <span class="text-danger">{{ $errors->first('cir_direction') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.meteoMap.fields.cir_direction_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="marker">{{ trans('cruds.meteoMap.fields.marker') }}</label>
                    <input class="form-control {{ $errors->has('marker') ? 'is-invalid' : '' }}" type="text"
                           name="marker" id="marker" value="{{ old('marker', $meteoMap->marker) }}">
                    @if($errors->has('marker'))
                        <span class="text-danger">{{ $errors->first('marker') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.meteoMap.fields.marker_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="period">{{ trans('cruds.meteoMap.fields.period') }}</label>
                    <input class="form-control {{ $errors->has('period') ? 'is-invalid' : '' }}" type="text"
                           name="period" id="period" value="{{ old('period', $meteoMap->period) }}">
                    @if($errors->has('period'))
                        <span class="text-danger">{{ $errors->first('period') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.meteoMap.fields.period_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="rainfall">{{ trans('cruds.meteoMap.fields.rainfall') }}</label>
                    <input class="form-control {{ $errors->has('rainfall') ? 'is-invalid' : '' }}" type="text"
                           name="rainfall" id="rainfall" value="{{ old('rainfall', $meteoMap->rainfall) }}">
                    @if($errors->has('rainfall'))
                        <span class="text-danger">{{ $errors->first('rainfall') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.meteoMap.fields.rainfall_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="snow">{{ trans('cruds.meteoMap.fields.snow') }}</label>
                    <input class="form-control {{ $errors->has('snow') ? 'is-invalid' : '' }}" type="text" name="snow"
                           id="snow" value="{{ old('snow', $meteoMap->snow) }}">
                    @if($errors->has('snow'))
                        <span class="text-danger">{{ $errors->first('snow') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.meteoMap.fields.snow_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="min_temp">{{ trans('cruds.meteoMap.fields.min_temp') }}</label>
                    <input class="form-control {{ $errors->has('min_temp') ? 'is-invalid' : '' }}" type="text"
                           name="min_temp" id="min_temp" value="{{ old('min_temp', $meteoMap->min_temp) }}">
                    @if($errors->has('min_temp'))
                        <span class="text-danger">{{ $errors->first('min_temp') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.meteoMap.fields.min_temp_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="max_temp">{{ trans('cruds.meteoMap.fields.max_temp') }}</label>
                    <input class="form-control {{ $errors->has('max_temp') ? 'is-invalid' : '' }}" type="text"
                           name="max_temp" id="max_temp" value="{{ old('max_temp', $meteoMap->max_temp) }}">
                    @if($errors->has('max_temp'))
                        <span class="text-danger">{{ $errors->first('max_temp') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.meteoMap.fields.max_temp_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="description">{{ trans('cruds.meteoMap.fields.description') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}"
                              name="description"
                              id="description">{!! old('description', $meteoMap->description) !!}</textarea>
                    @if($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.meteoMap.fields.description_helper') }}</span>
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
                editor.plugins.get('FileRepository').createUploadAdapter = function (loader) {
                    return {
                        upload: function () {
                            return loader.file
                                .then(function (file) {
                                    return new Promise(function (resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', '{{ route('admin.meteo-maps.storeCKEditorImages') }}', true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText = `Couldn't upload file: ${file.name}.`;
                                        xhr.addEventListener('error', function () {
                                            reject(genericErrorText)
                                        });
                                        xhr.addEventListener('abort', function () {
                                            reject()
                                        });
                                        xhr.addEventListener('load', function () {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                                            }

                                            $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                                            resolve({default: response.url});
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function (e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', '{{ $meteoMap->id ?? 0 }}');
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
