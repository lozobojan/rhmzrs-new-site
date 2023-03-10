@extends('layouts.admin')
@section('content')
    @can('eco_station_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.eco-information.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.ecoInformation.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'EcoInformation', 'route' => 'admin.eco-information.import'])
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.ecoInformation.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-EcoStation">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.ecoInformation.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.ecoInformation.fields.station_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.ecoInformation.fields.station_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.ecoInformation.fields.alt') }}
                        </th>
                        <th>
                            {{ trans('cruds.ecoInformation.fields.lng') }}
                        </th>
                        <th>
                            {{ trans('cruds.ecoInformation.fields.lat') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ecoInformations as $key => $ecoInformation)
                        <tr data-entry-id="{{ $ecoInformation->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $ecoInformation->id ?? '' }}
                            </td>
                            <td>
                                {{ $ecoInformation->station_id ?? '' }}
                            </td>
                            <td>
                                {{ $ecoInformation->station_name ?? '' }}
                            </td>
                            <td>
                                {{ $ecoInformation->alt ?? '' }}
                            </td>
                            <td>
                                {{ $ecoInformation->lng ?? '' }}
                            </td>
                            <td>
                                {{ $ecoInformation->lat ?? '' }}
                            </td>
                            <td>
                                @can('eco_station_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.eco-information.show', $ecoInformation->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('eco_station_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.eco-information.edit', $ecoInformation->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('eco_station_delete')
                                    <form action="{{ route('admin.eco-information.destroy', $ecoInformation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('eco_station_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.eco-information.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            });
            let table = $('.datatable-EcoStation:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })

    </script>
@endsection
