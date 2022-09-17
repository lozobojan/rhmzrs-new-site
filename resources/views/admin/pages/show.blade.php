@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.page.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.id') }}
                        </th>
                        <td>
                            {{ $page->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.title') }}
                        </th>
                        <td>
                            {{ $page->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.slug') }}
                        </th>
                        <td>
                            {{ $page->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.page.fields.html_content') }}
                        </th>
                        <td>
                            {{ $page->html_content }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pages.index') }}">
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
            <a class="nav-link" href="#page_projects" role="tab" data-toggle="tab">
                {{ trans('cruds.project.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#page_public_purchases" role="tab" data-toggle="tab">
                {{ trans('cruds.publicPurchase.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#page_public_competitions" role="tab" data-toggle="tab">
                {{ trans('cruds.publicCompetition.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#page_posts" role="tab" data-toggle="tab">
                {{ trans('cruds.post.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#page_links" role="tab" data-toggle="tab">
                {{ trans('cruds.link.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="page_projects">
            @includeIf('admin.pages.relationships.pageProjects', ['projects' => $page->pageProjects])
        </div>
        <div class="tab-pane" role="tabpanel" id="page_public_purchases">
            @includeIf('admin.pages.relationships.pagePublicPurchases', ['publicPurchases' => $page->pagePublicPurchases])
        </div>
        <div class="tab-pane" role="tabpanel" id="page_public_competitions">
            @includeIf('admin.pages.relationships.pagePublicCompetitions', ['publicCompetitions' => $page->pagePublicCompetitions])
        </div>
        <div class="tab-pane" role="tabpanel" id="page_posts">
            @includeIf('admin.pages.relationships.pagePosts', ['posts' => $page->pagePosts])
        </div>
        <div class="tab-pane" role="tabpanel" id="page_links">
            @includeIf('admin.pages.relationships.pageLinks', ['links' => $page->pageLinks])
        </div>
    </div>
</div>

@endsection