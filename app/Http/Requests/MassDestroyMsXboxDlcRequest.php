<?php

namespace App\Http\Requests;

use App\Models\MsXbox;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMsXboxDlcRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ms_xboxdlc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:ms_xboxes,id',
        ];
    }
}
