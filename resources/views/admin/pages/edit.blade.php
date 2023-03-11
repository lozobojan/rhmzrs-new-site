@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.page.title_singular') }}
        </div>

        <div class="card-body">
            <form method="post" id="form" action="{{ route("admin.pages.update", [$page->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.page.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title"
                           id="title" value="{{ old('title', $page->title) }}" required>
                    @if($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.page.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="slug">{{ trans('cruds.page.fields.slug') }}</label>
                    <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug"
                           id="slug" value="{{ old('slug', $page->slug) }}" required>
                    @if($errors->has('slug'))
                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.page.fields.slug_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="html_content">{{ trans('cruds.page.fields.html_content') }}</label>
                    {{--                <textarea class="form-control ckeditor {{ $errors->has('html_content') ? 'is-invalid' : '' }}" name="html_content" id="html_content">{!! old('html_content', $page->html_content) !!}</textarea>--}}
                    <div id="toolbar-container"></div>
                    <div class="ckeditor">
                        {!! $page->html_content !!}
                    </div>
                    <textarea style='display:none;' name='html_content' id='editor1'></textarea>
                    @if($errors->has('html_content'))
                        <span class="text-danger">{{ $errors->first('html_content') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.page.fields.html_content_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required"
                           for="attachments">{{ trans('cruds.publicCompetition.fields.attachments') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('attachments') ? 'is-invalid' : '' }}"
                         id="attachments-dropzone">
                    </div>
                    @if($errors->has('attachments'))
                        <span class="text-danger">{{ $errors->first('attachments') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.publicCompetition.fields.attachments_helper') }}</span>
                </div>
                <div id="descriptions">

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
    <script src="
https://cdn.jsdelivr.net/npm/@ckeditor/ckeditor5-source-editing@36.0.1/src/index.min.js
"></script>
    <link href="
https://cdn.jsdelivr.net/npm/@ckeditor/ckeditor5-source-editing@36.0.1/theme/sourceediting.min.css
" rel="stylesheet">
    <script>

        // On #form submit, get the HTML from the editor and set it as the value of the textarea
        $(document).on('submit', '#form', function () {
            let html = $(".ckeditor").html()
            $("#editor1").val(html)
        });

        var uploadedAttachmentsMap = {}
        Dropzone.options.attachmentsDropzone = {
            url: '{{ route('admin.pages.storeMedia') }}',
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 10
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="attachments[]" value="' + response.name + '">')
                uploadedAttachmentsMap[file.name] = response.name
            },
            removedfile: function (file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedAttachmentsMap[file.name]
                }
                $('form').find('input[name="attachments[]"][value="' + name + '"]').remove()
            },
            init: function () {
                this.on("sending", function (file, xhr, formData) {
                    let name = window.prompt(`Unesite opis za fajl ${file.name}`);
                    if (!name) {
                        name = "//";
                    }
                    document.querySelector("#descriptions").insertAdjacentHTML('afterend', `<input type="hidden" name="descriptions[]" value="${name}">`);
                });

                @if(isset($page) && $page->attachments)
                var files =
                    {!! json_encode($page->attachments) !!}
                    for(
                var i
            in
                files
            )
                {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="attachments[]" value="' + file.file_name + '">')
                }
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }

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
                                        xhr.open('POST', '{{ route('admin.pages.storeCKEditorImages') }}', true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText = `Couldn't upload file: ${file.name}.`;
                                        xhr.addEventListener('error', function (error) {
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
                                        data.append('crud_id', '{{ $page->id ?? 0 }}');
                                        xhr.send(data);
                                    });
                                })
                        }
                    };
                }
            }

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                DecoupledEditor.create(
                    allEditors[i], {
                        extraPlugins: [SimpleUploadAdapter],
                        alignment: {
                            options: ['left', 'right', 'justify', 'center']
                        },
                        toolbar: {
                            items: [
                                'findAndReplace', 'selectAll', '|',
                                'heading', '|',
                                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                                'bulletedList', 'numberedList', 'todoList', '|',
                                'alignment', '|',
                                'outdent', 'indent', '|',
                                'undo', 'redo',
                                '-',
                                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                                'alignment', '|',
                                'link', 'imageUpload', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                                'textPartLanguage', '|',
                                'sourceEditing'
                            ],
                            shouldNotGroupWhenFull: true
                        },
                    }
                ).then(editor => {
                    const toolbarContainer = document.querySelector('#toolbar-container');

                    toolbarContainer.appendChild(editor.ui.view.toolbar.element);
                })
                    .catch(error => {
                        console.error(error);
                    });
                ;
            }
        });
    </script>
@endsection
