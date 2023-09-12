@can('service_assign_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.service-assigns.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.serviceAssign.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.serviceAssign.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-servicePersonServiceAssigns">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.serviceAssign.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceAssign.fields.assign_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceAssign.fields.voucher_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceAssign.fields.service_person') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceAssign.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceAssign.fields.phone_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceAssign.fields.electric_available') }}
                        </th>
                        <th>
                            {{ trans('cruds.serviceAssign.fields.particular') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($serviceAssigns as $key => $serviceAssign)
                        <tr data-entry-id="{{ $serviceAssign->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $serviceAssign->id ?? '' }}
                            </td>
                            <td>
                                {{ $serviceAssign->assign_date ?? '' }}
                            </td>
                            <td>
                                {{ $serviceAssign->voucher_no->voucher_no ?? '' }}
                            </td>
                            <td>
                                {{ $serviceAssign->service_person->name ?? '' }}
                            </td>
                            <td>
                                {{ $serviceAssign->address ?? '' }}
                            </td>
                            <td>
                                {{ $serviceAssign->phone_no ?? '' }}
                            </td>
                            <td>
                                {{ $serviceAssign->electric_available ?? '' }}
                            </td>
                            <td>
                                {{ $serviceAssign->particular ?? '' }}
                            </td>
                            <td>
                                @can('service_assign_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.service-assigns.show', $serviceAssign->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('service_assign_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.service-assigns.edit', $serviceAssign->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('service_assign_delete')
                                    <form action="{{ route('admin.service-assigns.destroy', $serviceAssign->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('service_assign_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.service-assigns.massDestroy') }}",
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
  let table = $('.datatable-servicePersonServiceAssigns:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection