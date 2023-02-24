@extends('layouts.admin')
@section('content')
@can('gas_emission_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.gas-emissions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.gasEmission.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.gasEmission.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-GasEmission">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.gasEmission.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.gasEmission.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.gasEmission.fields.gas') }}
                        </th>
                        <th>
                            {{ trans('cruds.gasEmission.fields.year') }}
                        </th>
                        <th>
                            {{ trans('cruds.gasEmission.fields.value') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gasEmissions as $key => $gasEmission)
                        <tr data-entry-id="{{ $gasEmission->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $gasEmission->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\GasEmission::TYPE_SELECT[$gasEmission->type] ?? '' }}
                            </td>
                            <td>
                                {{ $gasEmission->gas ?? '' }}
                            </td>
                            <td>
                                {{ $gasEmission->year ?? '' }}
                            </td>
                            <td>
                                {{ $gasEmission->value ?? '' }}
                            </td>
                            <td>
                                @can('gas_emission_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.gas-emissions.show', $gasEmission->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('gas_emission_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.gas-emissions.edit', $gasEmission->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('gas_emission_delete')
                                    <form action="{{ route('admin.gas-emissions.destroy', $gasEmission->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('gas_emission_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.gas-emissions.massDestroy') }}",
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
  let table = $('.datatable-GasEmission:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection