@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.publicPurchase.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.public-purchases.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.publicPurchase.fields.id') }}
                        </th>
                        <td>
                            {{ $publicPurchase->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.publicPurchase.fields.html_content') }}
                        </th>
                        <td>
                            {!! $publicPurchase->html_content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.publicPurchase.fields.title') }}
                        </th>
                        <td>
                            {{ $publicPurchase->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.publicPurchase.fields.attachments') }}
                        </th>
                        <td>
                            @foreach($publicPurchase->attachments as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.publicPurchase.fields.date') }}
                        </th>
                        <td>
                            {{ $publicPurchase->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.publicPurchase.fields.page') }}
                        </th>
                        <td>
                            {{ $publicPurchase->page->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.public-purchases.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection