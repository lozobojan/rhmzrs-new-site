@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.documentAndRegulation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.document-and-regulations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.documentAndRegulation.fields.id') }}
                        </th>
                        <td>
                            {{ $documentAndRegulation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.documentAndRegulation.fields.title') }}
                        </th>
                        <td>
                            {{ $documentAndRegulation->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.documentAndRegulation.fields.attachments') }}
                        </th>
                        <td>
                            @foreach($documentAndRegulation->attachments as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.documentAndRegulation.fields.page') }}
                        </th>
                        <td>
                            {{ $documentAndRegulation->page->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.document-and-regulations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
