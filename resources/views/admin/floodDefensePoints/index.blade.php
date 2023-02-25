@extends('layouts.admin')
@section('content')
@can('flood_defense_point_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.flood-defense-points.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.floodDefensePoint.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['route' => 'admin.flood-defense-points.import'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.floodDefensePoint.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-FloodDefensePoint">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.floodDefensePoint.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.floodDefensePoint.fields.ordinal_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.floodDefensePoint.fields.place') }}
                        </th>
                        <th>
                            {{ trans('cruds.floodDefensePoint.fields.river_basin') }}
                        </th>
                        <th>
                            {{ trans('cruds.floodDefensePoint.fields.ordinary_value') }}
                        </th>
                        <th>
                            {{ trans('cruds.floodDefensePoint.fields.extraordinary_value') }}
                        </th>
                        <th>
                            {{ trans('cruds.floodDefensePoint.fields.nnv') }}
                        </th>
                        <th>
                            {{ trans('cruds.floodDefensePoint.fields.vvv') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($floodDefensePoints as $key => $floodDefensePoint)
                        <tr data-entry-id="{{ $floodDefensePoint->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $floodDefensePoint->id ?? '' }}
                            </td>
                            <td>
                                {{ $floodDefensePoint->ordinal_number ?? '' }}
                            </td>
                            <td>
                                {{ $floodDefensePoint->place ?? '' }}
                            </td>
                            <td>
                                {{ $floodDefensePoint->river_basin->title ?? '' }}
                            </td>
                            <td>
                                {{ $floodDefensePoint->ordinary_value ?? '' }}
                            </td>
                            <td>
                                {{ $floodDefensePoint->extraordinary_value ?? '' }}
                            </td>
                            <td>
                                {{ $floodDefensePoint->nnv ?? '' }}
                            </td>
                            <td>
                                {{ $floodDefensePoint->vvv ?? '' }}
                            </td>
                            <td>
                                @can('flood_defense_point_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.flood-defense-points.show', $floodDefensePoint->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('flood_defense_point_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.flood-defense-points.edit', $floodDefensePoint->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('flood_defense_point_delete')
                                    <form action="{{ route('admin.flood-defense-points.destroy', $floodDefensePoint->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('flood_defense_point_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.flood-defense-points.massDestroy') }}",
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
