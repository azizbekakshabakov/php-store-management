<?php

namespace App\Services\Impl;

use Illuminate\Http\Request;

use App\Services\GoodService;
use App\Models\Good;

class GoodServiceImpl implements GoodService {

    public function getAll() {
        $items = Good::all();

        if ( empty($items) ) {
            throw new \Exception("No info", 404);
        }

        return $items;
    }

    public function add(Request $request) {
        if ($request->has(['name', 'quantity', 'category_id', 'supplier_id', 'warehouse_id'])) {
            $good = new Good();
            $good->name = $request->get('name');
            $good->quantity = $request->get('quantity');
            $good->category_id = $request->get('category_id');
            $good->supplier_id = $request->get('supplier_id');
            $good->warehouse_id = $request->get('warehouse_id');

            $good->save();

            return response('Status OK', 200);
        }
        return response('Failed', 404);
    }

    public function edit(Request $request) {
        if ($request->has(['name', 'quantity', 'category_id', 'supplier_id', 'warehouse_id'])) {
            $good = Good::find($request->get('id'));
            $good->name = $request->get('name');
            $good->quantity = $request->get('quantity');
            $good->category_id = $request->get('category_id');
            $good->supplier_id = $request->get('supplier_id');
            $good->warehouse_id = $request->get('warehouse_id');

            $good->save();

            return response('Status OK', 200);
        }
        return response('Failed', 404);
    }

    public function remove($id) {
        try {
            $item = Good::find($id);
            $item->delete();
            return response('Status OK', 200);
        } catch (\Illuminate\Database\QueryException $ex) {
            return response('Failed: key constraint', 404);
        }
    }
}