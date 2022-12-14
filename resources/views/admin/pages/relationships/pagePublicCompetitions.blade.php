<div class="m-3">
    @can('public_competition_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.public-competitions.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.publicCompetition.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.publicCompetition.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-pagePublicCompetitions">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.publicCompetition.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.publicCompetition.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.publicCompetition.fields.attachments') }}
                            </th>
                            <th>
                                {{ trans('cruds.publicCompetition.fields.date') }}
                            </th>
                            <th>
                                {{ trans('cruds.publicCompetition.fields.page') }}
                            </th>
                            <th>
                                {{ trans('cruds.page.fields.slug') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($publicCompetitions as $key => $publicCompetition)
                            <tr data-entry-id="{{ $publicCompetition->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $publicCompetition->id ?? '' }}
                                </td>
                                <td>
                                    {{ $publicCompetition->title ?? '' }}
                                </td>
                                <td>
                                    @foreach($publicCompetition->attachments as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $publicCompetition->date ?? '' }}
                                </td>
                                <td>
                                    {{ $publicCompetition->page->title ?? '' }}
                                </td>
                                <td>
                                    {{ $publicCompetition->page->slug ?? '' }}
                                </td>
                                <td>
                                    @can('public_competition_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.public-competitions.show', $publicCompetition->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('public_competition_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.public-competitions.edit', $publicCompetition->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('public_competition_delete')
                                        <form action="{{ route('admin.public-competitions.destroy', $publicCompetition->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('public_competition_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.public-competitions.massDestroy') }}",
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
  let table = $('.datatable-pagePublicCompetitions:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection