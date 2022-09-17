<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MsXbox;
use App\Models\MsXboxDlc;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MsXboxDlcController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('ms_xboxdlc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MsXboxDlc::query()->select(sprintf('%s.*', (new MsXboxDlc())->table));
            $table = Datatables::of($query);

            $table->editColumn('index', function ($row) {
                return $row->index ? $row->index : '';
            });
            $table->editColumn('game_id', function ($row) {
                return $row->game_id ? $row->game_id : '';
            });
            $table->editColumn('product_name', function ($row) {
                return $row->product_name ? $row->product_name : '';
            });
            $table->editColumn('addon_name', function ($row) {
                return $row->addon_name ? $row->addon_name : '';
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });
            $table->editColumn('source', function ($row) {
                return $row->source ? $row->source : '';
            });
            $table->editColumn('platform', function ($row) {
                return $row->platform ? $row->platform : '';
            });

            return $table->make(true);
        }

        return view('admin.msXboxDlc.index');
    }
}
