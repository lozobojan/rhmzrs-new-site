@extends('layouts.admin')
@section('content')
@can('accelero_station_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.accelero-stations.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.acceleroStation.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.acceleroStation.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-AcceleroStation">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.acceleroStation.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.acceleroStation.fields.serial_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.acceleroStation.fields.station_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.acceleroStation.fields.station_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.acceleroStation.fields.network_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.acceleroStation.fields.alt') }}
                        </th>
                        <th>
                            {{ trans('cruds.acceleroStation.fields.lng') }}
                        </th>
                        <th>
                            {{ trans('cruds.acceleroStation.fields.lat') }}
                        </th>
                        <th>
                            {{ trans('cruds.acceleroStation.fields.digitizer') }}
                        </th>
                        <th>
                            {{ trans('cruds.acceleroStation.fields.sensor') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($acceleroStations as $key => $acceleroStation)
                        <tr data-entry-id="{{ $acceleroStation->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $acceleroStation->id ?? '' }}
                            </td>
                            <td>
                                {{ $acceleroStation->serial_number ?? '' }}
                            </td>
                            <td>
                                {{ $acceleroStation->station_id ?? '' }}
                            </td>
                            <td>
                                {{ $acceleroStation->station_name ?? '' }}
                            </td>
                            <td>
                                {{ $acceleroStation->network_code ?? '' }}
                            </td>
                            <td>
                                {{ $acceleroStation->alt ?? '' }}
                            </td>
                            <td>
                                {{ $acceleroStation->lng ?? '' }}
                            </td>
                            <td>
                                {{ $acceleroStation->lat ?? '' }}
                            </td>
                            <td>
                                {{ $acceleroStation->digitizer ?? '' }}
                            </td>
                            <td>
                                {{ $acceleroStation->sensor ?? '' }}
                            </td>
                            <td>
                                @can('accelero_station_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.accelero-stations.show', $acceleroStation->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('accelero_station_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.accelero-stations.edit', $acceleroStation->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('accelero_station_delete')
                                    <form action="{{ route('admin.accelero-stations.destroy', $acceleroStation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('accelero_station_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.accelero-stations.massDestroy') }}",
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
  let table = $('.datatable-AcceleroStation:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
