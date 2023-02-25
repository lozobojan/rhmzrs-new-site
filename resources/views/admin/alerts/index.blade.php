@extends('layouts.admin')
@section('content')
@can('alert_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.alerts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.alert.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.alert.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Alert">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.alert.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.alert.fields.active') }}
                        </th>
                        <th>
                            {{ trans('cruds.alert.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.alert.fields.level.level') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alerts as $key => $alert)
                        <tr data-entry-id="{{ $alert->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $alert->id ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $alert->active ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $alert->active ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $alert->title ?? '' }}
                            </td>
                            <td>
                                {{ $alert->level_text ?? '' }}
                            </td>
                            <td>
                                @can('alert_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.alerts.show', $alert->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('alert_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.alerts.edit', $alert->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('alert_delete')
                                    <form action="{{ route('admin.alerts.destroy', $alert->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('alert_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.alerts.massDestroy') }}",
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
  let table = $('.datatable-Alert:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
