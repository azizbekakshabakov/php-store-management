<?php

namespace App\Services\Impl;

use Illuminate\Http\Request;

use App\Services\SaleService;
use App\Models\Sale;

class SaleServiceImpl implements SaleService {

    public function getAll() {
        $items = Sale::all();

        if ( empty($items) ) {
            throw new \Exception("No info", 404);
        }

        return $items;
    }

    public function getOne($id) {
        $item = Sale::find($id);

        if ($item === null) 
            return response('Failed: entity not found', 404);

        return $item;
    }

    public function add(Request $request) {
        if ($request->has(['quantity', 'good_id'])) {
            $sale = new Sale();
            $sale->quantity = $request->get('quantity');
            $sale->good_id = $request->get('good_id');

            $sale->save();

            return response('Status OK', 200);
        }
        return response('Failed', 404);
    }

    public function edit(Request $request) {
        if ($request->has(['quantity', 'good_id'])) {
            $sale = Sale::find($request->get('id'));
            $sale->quantity = $request->get('quantity');
            $sale->good_id = $request->get('good_id');

            $sale->save();

            return response('Status OK', 200);
        }
        return response('Failed', 404);
    }

    public function remove($id) {
        try {
            $item = Sale::find($id);
            $item->delete();
            return response('Status OK', 200);
        } catch (\Illuminate\Database\QueryException $ex) {
            return response('Failed: key constraint', 404);
        }
    }
}