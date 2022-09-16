@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.XboxNow.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-XboxNow">
                <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.XboxNow.fields.index') }}
                    </th>
                    <th>
                        {{ trans('cruds.XboxNow.fields.game_id') }}
                    </th>
                    <th>
                        {{ trans('cruds.XboxNow.fields.title') }}
                    </th>
                    <th>
                        {{ trans('cruds.XboxNow.fields.url') }}
                    </th>
                    <th>
                        {{ trans('cruds.XboxNow.fields.is_game') }}
                    </th>
                    <th>
                        {{ trans('cruds.XboxNow.fields.release_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.XboxNow.fields.on_sale') }}
                    </th>
                    <th>
                        {{ trans('cruds.XboxNow.fields.discount_percent') }}
                    </th>
                    <th>
                        {{ trans('cruds.XboxNow.fields.end_sale') }}
                    </th>
                    <th>
                        {{ trans('cruds.XboxNow.fields.region_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.XboxNow.fields.price_region_1') }}
                    </th>
                    <th>
                        {{ trans('cruds.XboxNow.fields.region_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.XboxNow.fields.price_region_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.XboxNow.fields.region_3') }}
                    </th>
                    <th>
                        {{ trans('cruds.XboxNow.fields.price_region_3') }}
                    </th>
                </tr>
                <tr>
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
                ajax: "{{ route('admin.xbox-now.index') }}",
                columns: [
                    {data: 'placeholder', name: 'placeholder'},
                    {data: 'index', name: 'index'},
                    {data: 'game_id', name: 'game_id'},
                    {data: 'title', name: 'title'},
                    {data: 'url', name: 'url'},
                    {data: 'is_game', name: 'is_game'},
                    {data: 'release_date', name: 'release_date'},
                    {data: 'on_sale', name: 'on_sale'},
                    {data: 'discount_percent', name: 'discount_percent'},
                    {data: 'end_sale', name: 'end_sale'},
                    {data: 'region_1', name: 'region_1'},
                    {data: 'price_region_1', name: 'price_region_1'},
                    {data: 'region_2', name: 'region_2'},
                    {data: 'price_region_2', name: 'price_region_2'},
                    {data: 'region_3', name: 'region_3'},
                    {data: 'price_region_3', name: 'price_region_3'}
                ],
                orderCellsTop: true,
                order: [[1, 'desc']],
                pageLength: 100,
            };
            let table = $('.datatable-XboxNow').DataTable(dtOverrideGlobals);
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
