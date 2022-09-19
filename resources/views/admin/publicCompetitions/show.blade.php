@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.publicCompetition.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.public-competitions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.publicCompetition.fields.id') }}
                        </th>
                        <td>
                            {{ $publicCompetition->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.publicCompetition.fields.html_content') }}
                        </th>
                        <td>
                            {!! $publicCompetition->html_content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.publicCompetition.fields.title') }}
                        </th>
                        <td>
                            {{ $publicCompetition->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.publicCompetition.fields.description') }}
                        </th>
                        <td>
                            {{ $publicCompetition->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.publicCompetition.fields.attachments') }}
                        </th>
                        <td>
                            @foreach($publicCompetition->attachments as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.publicCompetition.fields.date') }}
                        </th>
                        <td>
                            {{ $publicCompetition->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.publicCompetition.fields.page') }}
                        </th>
                        <td>
                            {{ $publicCompetition->page->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.public-competitions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
