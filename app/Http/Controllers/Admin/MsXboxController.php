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

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'ms_xbox_show';
                $editGate = 'ms_xbox_edit';
                $deleteGate = 'ms_xbox_delete';
                $crudRoutePart = 'ms-xboxes';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('game', function ($row) {
                return $row->game ? $row->game : '';
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
                return '<input type="checkbox" disabled ' . ($row->on_sale ? 'checked' : null) . '>';
            });
            $table->editColumn('price_on_sale', function ($row) {
                return $row->price_on_sale ? $row->price_on_sale : '';
            });
            $table->editColumn('release_date', function ($row) {
                return $row->release_date ? $row->release_date : '';
            });
            $table->editColumn('pre_order', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->pre_order ? 'checked' : null) . '>';
            });
            $table->editColumn('platform', function ($row) {
                return $row->platform ? $row->platform : '';
            });
            $table->editColumn('source', function ($row) {
                return $row->source ? $row->source : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'on_sale', 'pre_order']);

            return $table->make(true);
        }

        return view('admin.msXboxes.index');
    }
}
