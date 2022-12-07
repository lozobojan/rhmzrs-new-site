@extends('layouts.admin')
@section('content')
@can('bio_prognosi_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.bio-prognosis.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.bioPrognosi.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.bioPrognosi.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-BioPrognosi">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.bioPrognosi.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.bioPrognosi.fields.station_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.bioPrognosi.fields.station_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.bioPrognosi.fields.alt') }}
                        </th>
                        <th>
                            {{ trans('cruds.bioPrognosi.fields.lng') }}
                        </th>
                        <th>
                            {{ trans('cruds.bioPrognosi.fields.lat') }}
                        </th>
                        <th>
                            {{ trans('cruds.bioPrognosi.fields.value') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bioPrognosis as $key => $bioPrognosi)
                        <tr data-entry-id="{{ $bioPrognosi->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $bioPrognosi->id ?? '' }}
                            </td>
                            <td>
                                {{ $bioPrognosi->station_id ?? '' }}
                            </td>
                            <td>
                                {{ $bioPrognosi->station_name ?? '' }}
                            </td>
                            <td>
                                {{ $bioPrognosi->alt ?? '' }}
                            </td>
                            <td>
                                {{ $bioPrognosi->lng ?? '' }}
                            </td>
                            <td>
                                {{ $bioPrognosi->lat ?? '' }}
                            </td>
                            <td>
                                {{ $bioPrognosi->value ?? '' }}
                            </td>
                            <td>
                                @can('bio_prognosi_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.bio-prognosis.show', $bioPrognosi->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('bio_prognosi_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.bio-prognosis.edit', $bioPrognosi->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('bio_prognosi_delete')
                                    <form action="{{ route('admin.bio-prognosis.destroy', $bioPrognosi->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('bio_prognosi_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.bio-prognosis.massDestroy') }}",
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
  let table = $('.datatable-BioPrognosi:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
