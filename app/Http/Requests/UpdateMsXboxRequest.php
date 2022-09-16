<?php

namespace App\Http\Requests;

use App\Models\MsXbox;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMsXboxRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ms_xbox_edit');
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
            'ranking' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'price' => [
                'numeric',
            ],
            'price_on_sale' => [
                'numeric',
            ],
            'release_date' => [
                'string',
                'nullable',
            ],
            'platform' => [
                'string',
                'required',
            ],
            'source' => [
                'string',
                'required',
            ],
        ];
    }
}
