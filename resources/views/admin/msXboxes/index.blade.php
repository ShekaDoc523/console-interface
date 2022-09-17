@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.msXbox.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-MsXbox">
                <thead>
                <tr>
                    <th>
                        {{ trans('cruds.msXbox.fields.index') }}
                    </th>
                    <th>
                        {{ trans('cruds.msXbox.fields.game_id') }}
                    </th>
                    <th>
                        {{ trans('cruds.msXbox.fields.product_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.msXbox.fields.ranking') }}
                    </th>
                    <th>
                        {{ trans('cruds.msXbox.fields.price') }}
                    </th>
                    <th>
                        {{ trans('cruds.msXbox.fields.on_sale') }}
                    </th>
                    <th>
                        {{ trans('cruds.msXbox.fields.price_on_sale') }}
                    </th>
                    <th>
                        {{ trans('cruds.msXbox.fields.release_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.msXbox.fields.pre_order') }}
                    </th>
                    <th>
                        {{ trans('cruds.msXbox.fields.platform') }}
                    </th>
                    <th>
                        {{ trans('cruds.msXbox.fields.source') }}
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
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
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
                ajax: "{{ route('admin.ms-xboxes.index') }}",
                columns: [
                    {data: 'index', name: 'index'},
                    {data: 'game_id', name: 'game_id'},
                    {data: 'product_name', name: 'product_name'},
                    {data: 'ranking', name: 'ranking'},
                    {data: 'price', name: 'price'},
                    {data: 'on_sale', name: 'on_sale'},
                    {data: 'price_on_sale', name: 'price_on_sale'},
                    {data: 'release_date', name: 'release_date'},
                    {data: 'pre_order', name: 'pre_order'},
                    {data: 'platform', name: 'platform'},
                    {data: 'source', name: 'source'}
                ],
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 100,
                columnDefs:[]
            };
            let table = $('.datatable-MsXbox').DataTable(dtOverrideGlobals);
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
