<?php

namespace App\Http\Requests;

use App\Models\MsXbox;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMsXboxDlcRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ms_xboxdlc_create');
    }

    public function rules()
    {
        return [
            'game_id' => [
                'string',
                'required',
            ],
            'product_name' => [
                'string',
                'nullable',
            ],
            'addon_name' => [
                'string',
                'nullable',
            ],
            'price' => [
                'numeric',
            ],
            'source' => [
                'string',
                'required',
            ],
            'platform' => [
                'string',
                'required',
            ],
        ];
    }
}
