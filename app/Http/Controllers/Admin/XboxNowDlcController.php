<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MsXbox;
use App\Models\XboxNow;
use App\Models\XboxNowDlc;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class XboxNowDlcController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('xbox_now_dlc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = XboxNowDlc::query()->select(sprintf('%s.*', (new XboxNowDlc())->table));
            $table = Datatables::of($query);

            $table->editColumn('index', function ($row) {
                return $row->index ? $row->index : '';
            });
            $table->editColumn('game_id', function ($row) {
                return $row->game_id ? $row->game_id : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('url', function ($row) {
                return $row->url ? $row->url : '';
            });
            $table->editColumn('is_game', function ($row) {
                return '<input type="checkbox" disabled '.($row->is_game ? 'checked' : null).'>';
            });
            $table->editColumn('on_sale', function ($row) {
                return '<input type="checkbox" disabled '.($row->on_sale ? 'checked' : null).'>';
            });
            $table->editColumn('discount_percent', function ($row) {
                return $row->discount_percent ? $row->discount_percent : '';
            });
            $table->editColumn('end_sale', function ($row) {
                return $row->end_sale ? $row->end_sale : '';
            });
            $table->editColumn('region_1', function ($row) {
                return $row->region_1 ? $row->region_1 : '';
            });
            $table->editColumn('price_region_1', function ($row) {
                return $row->price_region_1 ? $row->price_region_1 : '';
            });
            $table->editColumn('region_2', function ($row) {
                return $row->region_2 ? $row->region_2 : '';
            });
            $table->editColumn('price_region_2', function ($row) {
                return $row->price_region_2 ? $row->price_region_2 : '';
            });
            $table->editColumn('region_3', function ($row) {
                return $row->region_3 ? $row->region_3 : '';
            });
            $table->editColumn('price_region_3', function ($row) {
                return $row->price_region_3 ? $row->price_region_3 : '';
            });

            $table->rawColumns(['on_sale', 'is_game']);

            return $table->make(true);
        }

        return view('admin.XboxNowDlc.index');
    }
}
