@extends('layouts.admin')
@section('content')
@can('river_basin_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.river-basins.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.riverBasin.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.riverBasin.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-RiverBasin">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.riverBasin.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.riverBasin.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.riverBasin.fields.photo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($riverBasins as $key => $riverBasin)
                        <tr data-entry-id="{{ $riverBasin->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $riverBasin->id ?? '' }}
                            </td>
                            <td>
                                {{ $riverBasin->title ?? '' }}
                            </td>
                            <td>
                                @if($riverBasin->photo)
                                    <a href="{{ $riverBasin->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $riverBasin->photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('river_basin_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.river-basins.show', $riverBasin->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('river_basin_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.river-basins.edit', $riverBasin->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('river_basin_delete')
                                    <form action="{{ route('admin.river-basins.destroy', $riverBasin->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('river_basin_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.river-basins.massDestroy') }}",
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
  let table = $('.datatable-RiverBasin:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection