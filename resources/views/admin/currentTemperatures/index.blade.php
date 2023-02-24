@extends('layouts.admin')
@section('content')
@can('current_temperature_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.current-temperatures.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.currentTemperature.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.currentTemperature.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CurrentTemperature">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.currentTemperature.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.currentTemperature.fields.station_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.currentTemperature.fields.station_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.currentTemperature.fields.alt') }}
                        </th>
                        <th>
                            {{ trans('cruds.currentTemperature.fields.lng') }}
                        </th>
                        <th>
                            {{ trans('cruds.currentTemperature.fields.lat') }}
                        </th>
                        <th>
                            {{ trans('cruds.currentTemperature.fields.current_temperature') }}
                        </th>
                        <th>
                            {{ trans('cruds.currentTemperature.fields.period') }}
                        </th>
                        <th>
                            {{ trans('cruds.currentTemperature.fields.description') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($currentTemperatures as $key => $currentTemperature)
                        <tr data-entry-id="{{ $currentTemperature->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $currentTemperature->id ?? '' }}
                            </td>
                            <td>
                                {{ $currentTemperature->station_id ?? '' }}
                            </td>
                            <td>
                                {{ $currentTemperature->station_name ?? '' }}
                            </td>
                            <td>
                                {{ $currentTemperature->alt ?? '' }}
                            </td>
                            <td>
                                {{ $currentTemperature->lng ?? '' }}
                            </td>
                            <td>
                                {{ $currentTemperature->lat ?? '' }}
                            </td>
                            <td>
                                {{ $currentTemperature->current_temperature ?? '' }}
                            </td>
                            <td>
                                {{ $currentTemperature->period ?? '' }}
                            </td>
                            <td>
                                {{ $currentTemperature->description ?? '' }}
                            </td>
                            <td>
                                @can('current_temperature_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.current-temperatures.show', $currentTemperature->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('current_temperature_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.current-temperatures.edit', $currentTemperature->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('current_temperature_delete')
                                    <form action="{{ route('admin.current-temperatures.destroy', $currentTemperature->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('current_temperature_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.current-temperatures.massDestroy') }}",
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
  let table = $('.datatable-CurrentTemperature:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
