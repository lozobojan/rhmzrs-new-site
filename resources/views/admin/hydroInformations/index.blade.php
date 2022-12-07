@extends('layouts.admin')
@section('content')
@can('hydro_information_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.hydro-informations.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.hydroInformation.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.hydroInformation.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-HydroInformation">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.station_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.station_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.alt') }}
                        </th>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.lng') }}
                        </th>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.lat') }}
                        </th>
                        <th>
                            {{ trans('cruds.hydroInformation.fields.about') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hydroInformations as $key => $hydroInformation)
                        <tr data-entry-id="{{ $hydroInformation->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $hydroInformation->id ?? '' }}
                            </td>
                            <td>
                                {{ $hydroInformation->station_id ?? '' }}
                            </td>
                            <td>
                                {{ $hydroInformation->station_name ?? '' }}
                            </td>
                            <td>
                                {{ $hydroInformation->alt ?? '' }}
                            </td>
                            <td>
                                {{ $hydroInformation->lng ?? '' }}
                            </td>
                            <td>
                                {{ $hydroInformation->lat ?? '' }}
                            </td>
                            <td>
                                {{ $hydroInformation->about ?? '' }}
                            </td>
                            <td>
                                @can('hydro_information_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.hydro-informations.show', $hydroInformation->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('hydro_information_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.hydro-informations.edit', $hydroInformation->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('hydro_information_delete')
                                    <form action="{{ route('admin.hydro-informations.destroy', $hydroInformation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('hydro_information_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.hydro-informations.massDestroy') }}",
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
  let table = $('.datatable-HydroInformation:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
