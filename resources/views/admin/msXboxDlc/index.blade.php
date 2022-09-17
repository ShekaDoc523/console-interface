@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.msXboxDlc.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-msXboxDlc">
                <thead>
                <tr>
                    <th>
                        {{ trans('cruds.msXboxDlc.fields.index') }}
                    </th>
                    <th>
                        {{ trans('cruds.msXboxDlc.fields.game_id') }}
                    </th>
                    <th>
                        {{ trans('cruds.msXboxDlc.fields.product_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.msXboxDlc.fields.addon_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.msXboxDlc.fields.price') }}
                    </th>
                    <th>
                        {{ trans('cruds.msXboxDlc.fields.source') }}
                    </th>
                    <th>
                        {{ trans('cruds.msXboxDlc.fields.platform') }}
                    </th>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <style>
        .dt-buttons, #DataTables_Table_0_filter {
            display: none;
        }
    </style>

@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: "{{ route('admin.ms-xboxesdlc.index') }}",
                columns: [
                    {data: 'index', name: 'index'},
                    {data: 'game_id', name: 'game_id'},
                    {data: 'product_name', name: 'product_name'},
                    {data: 'addon_name', name: 'addon_name'},
                    {data: 'price', name: 'price'},
                    {data: 'source', name: 'source'},
                    {data: 'platform', name: 'platform'},
                ],
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 100,
                columnDefs: []
            };
            let table = $('.datatable-msXboxDlc').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

            let visibleColumnsIndexes = null;
            $('.datatable thead').on('input', '.search', function () {
                let strict = $(this).attr('strict') || false
                let value = strict && this.value ? "^" + this.value + "$" : this.value

                let index = $(this).parent().index()
                if (visibleColumnsIndexes !== null) {
                    index = visibleColumnsIndexes[index]
                }

                table
                    .column(index)
                    .search(value, strict)
                    .draw()
            });
            table.on('column-visibility.dt', function (e, settings, column, state) {
                visibleColumnsIndexes = []
                table.columns(":visible").every(function (colIdx) {
                    visibleColumnsIndexes.push(colIdx);
                });
            })
        });

    </script>
@endsection
