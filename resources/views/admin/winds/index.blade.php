@extends('layouts.admin')
@section('content')
@can('wind_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.winds.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.wind.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.wind.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Wind">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.wind.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.wind.fields.station_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.wind.fields.station_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.wind.fields.alt') }}
                        </th>
                        <th>
                            {{ trans('cruds.wind.fields.lng') }}
                        </th>
                        <th>
                            {{ trans('cruds.wind.fields.lat') }}
                        </th>
                        <th>
                            {{ trans('cruds.wind.fields.wind_speed') }}
                        </th>
                        <th>
                            {{ trans('cruds.wind.fields.lat_direction') }}
                        </th>
                        <th>
                            {{ trans('cruds.wind.fields.cir_direction') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($winds as $key => $wind)
                        <tr data-entry-id="{{ $wind->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $wind->id ?? '' }}
                            </td>
                            <td>
                                {{ $wind->station_id ?? '' }}
                            </td>
                            <td>
                                {{ $wind->station_name ?? '' }}
                            </td>
                            <td>
                                {{ $wind->alt ?? '' }}
                            </td>
                            <td>
                                {{ $wind->lng ?? '' }}
                            </td>
                            <td>
                                {{ $wind->lat ?? '' }}
                            </td>
                            <td>
                                {{ $wind->wind_speed ?? '' }}
                            </td>
                            <td>
                                {{ $wind->lat_direction ?? '' }}
                            </td>
                            <td>
                                {{ $wind->cir_direction ?? '' }}
                            </td>
                            <td>
                                @can('wind_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.winds.show', $wind->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('wind_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.winds.edit', $wind->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('wind_delete')
                                    <form action="{{ route('admin.winds.destroy', $wind->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('wind_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.winds.massDestroy') }}",
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
  let table = $('.datatable-Wind:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
