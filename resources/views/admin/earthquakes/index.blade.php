@extends('layouts.admin')
@section('content')
@can('earthquake_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.earthquakes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.earthquake.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'EcoStation', 'route' => 'admin.earthquakes.import'])
{{--            <div class="mt-3 d-flex border-2 border-white bg-white">--}}
{{--                <form action="{{ route('admin.earthquakes.import') }}" method="POST" enctype="multipart/form-data">--}}
{{--                    @csrf--}}
{{--                <div class="mb-1">--}}


{{--                    <input type="file" name="file" accept="csv,xls,xlsx" class="form-">--}}
{{--                </div>--}}
{{--                <div class="">--}}
{{--                    <button class="btn btn-success">--}}
{{--                        Import User Data--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--            <div class="container">--}}
{{--                <div class="card bg-light mt-3">--}}
{{--                    <div class="card-body">--}}
{{--                        <form action="{{ route('admin.earthquakes.import') }}"--}}
{{--                              method="POST"--}}
{{--                              enctype="multipart/form-data">--}}
{{--                            @csrf--}}


{{--                            <br>--}}
{{--                            <button class="btn btn-success">--}}
{{--                                Import User Data--}}
{{--                            </button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.earthquake.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Earthquake">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.earthquake.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.earthquake.fields.batch_version') }}
                        </th>
                        <th>
                            {{ trans('cruds.earthquake.fields.earthquake_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.earthquake.fields.publish_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.earthquake.fields.earthquake_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.earthquake.fields.earthquake_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.earthquake.fields.lat') }}
                        </th>
                        <th>
                            {{ trans('cruds.earthquake.fields.long') }}
                        </th>
                        <th>
                            {{ trans('cruds.earthquake.fields.depth') }}
                        </th>
                        <th>
                            {{ trans('cruds.earthquake.fields.magnitude') }}
                        </th>
                        <th>
                            {{ trans('cruds.earthquake.fields.place') }}
                        </th>
                        <th>
                            {{ trans('cruds.earthquake.fields.municipality') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($earthquakes as $key => $earthquake)
                        <tr data-entry-id="{{ $earthquake->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $earthquake->id ?? '' }}
                            </td>
                            <td>
                                {{ $earthquake->batch_version ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Earthquake::EARTHQUAKE_TYPE_SELECT[$earthquake->earthquake_type] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Earthquake::PUBLISH_STATUS_SELECT[$earthquake->publish_status] ?? '' }}
                            </td>
                            <td>
                                {{ $earthquake->earthquake_date ?? '' }}
                            </td>
                            <td>
                                {{ $earthquake->earthquake_time ?? '' }}
                            </td>
                            <td>
                                {{ $earthquake->lat ?? '' }}
                            </td>
                            <td>
                                {{ $earthquake->lng ?? '' }}
                            </td>
                            <td>
                                {{ $earthquake->depth ?? '' }}
                            </td>
                            <td>
                                {{ $earthquake->magnitude ?? '' }}
                            </td>
                            <td>
                                {{ $earthquake->place ?? '' }}
                            </td>
                            <td>
                                {{ $earthquake->municipality ?? '' }}
                            </td>
                            <td>
                                @can('earthquake_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.earthquakes.show', $earthquake->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('earthquake_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.earthquakes.edit', $earthquake->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('earthquake_delete')
                                    <form action="{{ route('admin.earthquakes.destroy', $earthquake->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('earthquake_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.earthquakes.massDestroy') }}",
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
  let table = $('.datatable-Earthquake:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
