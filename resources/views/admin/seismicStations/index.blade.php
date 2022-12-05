@extends('layouts.admin')
@section('content')
@can('flood_defense_point_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.seismic-station.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.seismicStation.title_singular') }}
            </a>
            <div class="mt-3 d-flex border-2 border-white bg-white">
                <form action="{{ route('admin.seismic-station.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-1">


                        <input type="file" name="file" accept="csv,xls,xlsx" class="form-">
                    </div>
                    <div class="">
                        <button class="btn btn-success">
                            Import User Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.seismicStation.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-FloodDefensePoint">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.seismicStation.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.seismicStation.fields.station_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.seismicStation.fields.lat') }}
                        </th>
                        <th>
                            {{ trans('cruds.seismicStation.fields.lng') }}
                        </th>
                        <th>
                            {{ trans('cruds.seismicStation.fields.alt') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($seismicStations as $key => $seismicStation)
                        <tr data-entry-id="{{ $seismicStation->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $seismicStation->id ?? '' }}
                            </td>
                            <td>
                                {{ $seismicStation->station_name ?? '' }}
                            </td>
                            <td>
                                {{ $seismicStation->lat ?? '' }}
                            </td>
                            <td>
                                {{ $seismicStation->lng ?? '' }}
                            </td>
                            <td>
                                {{ $seismicStation->alt ?? '' }}
                            </td>
                            <td>
                                @can('seismic-station_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.seismic-station.show', $seismicStation->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('seismic-station_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.seismic-station.edit', $seismicStation->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('seismic-station_delete')
                                    <form action="{{ route('admin.seismic-station.destroy', $seismicStation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('seismic-station_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.seismic-station.massDestroy') }}",
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
  let table = $('.datatable-FloodDefensePoint:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
