@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.msXbox.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ms-xboxes.update", [$msXbox->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="game">{{ trans('cruds.msXbox.fields.game') }}</label>
                <input class="form-control {{ $errors->has('game') ? 'is-invalid' : '' }}" type="text" name="game" id="game" value="{{ old('game', $msXbox->game) }}" required>
                @if($errors->has('game'))
                    <div class="invalid-feedback">
                        {{ $errors->first('game') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.msXbox.fields.game_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_name">{{ trans('cruds.msXbox.fields.product_name') }}</label>
                <input class="form-control {{ $errors->has('product_name') ? 'is-invalid' : '' }}" type="text" name="product_name" id="product_name" value="{{ old('product_name', $msXbox->product_name) }}">
                @if($errors->has('product_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.msXbox.fields.product_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ranking">{{ trans('cruds.msXbox.fields.ranking') }}</label>
                <input class="form-control {{ $errors->has('ranking') ? 'is-invalid' : '' }}" type="number" name="ranking" id="ranking" value="{{ old('ranking', $msXbox->ranking) }}" step="1">
                @if($errors->has('ranking'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ranking') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.msXbox.fields.ranking_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price">{{ trans('cruds.msXbox.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $msXbox->price) }}" step="0.01">
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.msXbox.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('on_sale') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="on_sale" value="0">
                    <input class="form-check-input" type="checkbox" name="on_sale" id="on_sale" value="1" {{ $msXbox->on_sale || old('on_sale', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="on_sale">{{ trans('cruds.msXbox.fields.on_sale') }}</label>
                </div>
                @if($errors->has('on_sale'))
                    <div class="invalid-feedback">
                        {{ $errors->first('on_sale') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.msXbox.fields.on_sale_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price_on_sale">{{ trans('cruds.msXbox.fields.price_on_sale') }}</label>
                <input class="form-control {{ $errors->has('price_on_sale') ? 'is-invalid' : '' }}" type="number" name="price_on_sale" id="price_on_sale" value="{{ old('price_on_sale', $msXbox->price_on_sale) }}" step="0.01">
                @if($errors->has('price_on_sale'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price_on_sale') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.msXbox.fields.price_on_sale_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="release_date">{{ trans('cruds.msXbox.fields.release_date') }}</label>
                <input class="form-control {{ $errors->has('release_date') ? 'is-invalid' : '' }}" type="text" name="release_date" id="release_date" value="{{ old('release_date', $msXbox->release_date) }}">
                @if($errors->has('release_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('release_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.msXbox.fields.release_date_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('pre_order') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="pre_order" value="0">
                    <input class="form-check-input" type="checkbox" name="pre_order" id="pre_order" value="1" {{ $msXbox->pre_order || old('pre_order', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="pre_order">{{ trans('cruds.msXbox.fields.pre_order') }}</label>
                </div>
                @if($errors->has('pre_order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pre_order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.msXbox.fields.pre_order_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="platform">{{ trans('cruds.msXbox.fields.platform') }}</label>
                <input class="form-control {{ $errors->has('platform') ? 'is-invalid' : '' }}" type="text" name="platform" id="platform" value="{{ old('platform', $msXbox->platform) }}" required>
                @if($errors->has('platform'))
                    <div class="invalid-feedback">
                        {{ $errors->first('platform') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.msXbox.fields.platform_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="source">{{ trans('cruds.msXbox.fields.source') }}</label>
                <input class="form-control {{ $errors->has('source') ? 'is-invalid' : '' }}" type="text" name="source" id="source" value="{{ old('source', $msXbox->source) }}" required>
                @if($errors->has('source'))
                    <div class="invalid-feedback">
                        {{ $errors->first('source') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.msXbox.fields.source_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection