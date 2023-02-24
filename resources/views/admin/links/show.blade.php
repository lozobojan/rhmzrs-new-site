@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.link.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.links.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.link.fields.id') }}
                        </th>
                        <td>
                            {{ $link->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.link.fields.title') }}
                        </th>
                        <td>
                            {{ $link->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.link.fields.slug') }}
                        </th>
                        <td>
                            {{ $link->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.link.fields.route') }}
                        </th>
                        <td>
                            {{ $link->route }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.link.fields.page') }}
                        </th>
                        <td>
                            {{ $link->page->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.link.fields.parent') }}
                        </th>
                        <td>
                            {{ $link->parent->slug ?? '/' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.links.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#parent_links" role="tab" data-toggle="tab">
                {{ trans('cruds.link.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="parent_links">
            @includeIf('admin.links.relationships.parentLinks', ['links' => $link->parentLinks])
        </div>
    </div>
</div>

@endsection
