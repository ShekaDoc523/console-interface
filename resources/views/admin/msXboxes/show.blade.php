@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.msXbox.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ms-xboxes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.msXbox.fields.id') }}
                        </th>
                        <td>
                            {{ $msXbox->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.msXbox.fields.game') }}
                        </th>
                        <td>
                            {{ $msXbox->game }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.msXbox.fields.product_name') }}
                        </th>
                        <td>
                            {{ $msXbox->product_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.msXbox.fields.ranking') }}
                        </th>
                        <td>
                            {{ $msXbox->ranking }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.msXbox.fields.price') }}
                        </th>
                        <td>
                            {{ $msXbox->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.msXbox.fields.on_sale') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $msXbox->on_sale ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.msXbox.fields.price_on_sale') }}
                        </th>
                        <td>
                            {{ $msXbox->price_on_sale }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.msXbox.fields.release_date') }}
                        </th>
                        <td>
                            {{ $msXbox->release_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.msXbox.fields.pre_order') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $msXbox->pre_order ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.msXbox.fields.platform') }}
                        </th>
                        <td>
                            {{ $msXbox->platform }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.msXbox.fields.source') }}
                        </th>
                        <td>
                            {{ $msXbox->source }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ms-xboxes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection