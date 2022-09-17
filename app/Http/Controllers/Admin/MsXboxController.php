<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MsXbox;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MsXboxController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('ms_xbox_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MsXbox::query()->select(sprintf('%s.*', (new MsXbox())->table));
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
            $table->editColumn('ranking', function ($row) {
                return $row->ranking ? $row->ranking : '';
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });
            $table->editColumn('on_sale', function ($row) {
                return '<input type="checkbox" disabled '.($row->on_sale ? 'checked' : null).'>';
            });
            $table->editColumn('price_on_sale', function ($row) {
                return $row->price_on_sale ? $row->price_on_sale : '';
            });
            $table->editColumn('release_date', function ($row) {
                return $row->release_date ? $row->release_date : '';
            });
            $table->editColumn('pre_order', function ($row) {
                return '<input type="checkbox" disabled '.($row->pre_order ? 'checked' : null).'>';
            });
            $table->editColumn('platform', function ($row) {
                return $row->platform ? $row->platform : '';
            });
            $table->editColumn('source', function ($row) {
                return $row->source ? $row->source : '';
            });

            $table->rawColumns(['on_sale', 'pre_order']);

            return $table->make(true);
        }

        return view('admin.msXboxes.index');
    }
}
