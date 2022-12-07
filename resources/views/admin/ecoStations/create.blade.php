@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.ecoStation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.eco-stations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="batch_version">{{ trans('cruds.ecoStation.fields.batch_version') }}</label>
                <input class="form-control {{ $errors->has('batch_version') ? 'is-invalid' : '' }}" type="text" name="batch_version" id="batch_version" value="{{ old('batch_version', '') }}" required>
                @if($errors->has('batch_version'))
                    <span class="text-danger">{{ $errors->first('batch_version') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoStation.fields.batch_version_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="station_id">{{ trans('cruds.ecoStation.fields.station_id') }}</label>
                <input class="form-control {{ $errors->has('station_id') ? 'is-invalid' : '' }}" type="text" name="station_id" id="station_id" value="{{ old('station_id', '') }}">
                @if($errors->has('station_id'))
                    <span class="text-danger">{{ $errors->first('station_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoStation.fields.station_id_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="station_name">{{ trans('cruds.ecoStation.fields.station_name') }}</label>
                <input class="form-control {{ $errors->has('station_name') ? 'is-invalid' : '' }}" type="text" name="station_name" id="station_name" value="{{ old('station_name', '') }}" required>
                @if($errors->has('station_name'))
                    <span class="text-danger">{{ $errors->first('station_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoStation.fields.station_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="alt">{{ trans('cruds.ecoStation.fields.alt') }}</label>
                <input class="form-control {{ $errors->has('alt') ? 'is-invalid' : '' }}" type="text" name="alt" id="alt" value="{{ old('alt', '') }}" required>
                @if($errors->has('alt'))
                    <span class="text-danger">{{ $errors->first('alt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoStation.fields.alt_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lng">{{ trans('cruds.ecoStation.fields.lng') }}</label>
                <input class="form-control {{ $errors->has('lng') ? 'is-invalid' : '' }}" type="text" name="lng" id="lng" value="{{ old('lng', '') }}" required>
                @if($errors->has('lng'))
                    <span class="text-danger">{{ $errors->first('lng') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoStation.fields.lng_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lat">{{ trans('cruds.ecoStation.fields.lat') }}</label>
                <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="text" name="lat" id="lat" value="{{ old('lat', '') }}" required>
                @if($errors->has('lat'))
                    <span class="text-danger">{{ $errors->first('lat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoStation.fields.lat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.ecoStation.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ecoStation.fields.description_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.eco-stations.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $ecoStation->id ?? 0 }}');
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
