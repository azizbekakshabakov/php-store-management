<?php

namespace App\Services\Impl;

use Illuminate\Http\Request;

use App\Services\WarehouseService;
use App\Models\Warehouse;

class WarehouseServiceImpl implements WarehouseService {

    public function getAll() {
        $items = Warehouse::all();

        if ( empty($items) ) {
            throw new \Exception("No info", 404);
        }

        return $items;
    }

    public function getOne($id) {
        $item = Warehouse::find($id);

        if ($item === null) 
            return response('Failed: entity not found', 404);

        return $item;
    }

    public function add(Request $request) {
        if ($request->has(['index', 'address', 'area'])) {
            $warehouse = new Warehouse();
            $warehouse->index = $request->get('index');
            $warehouse->address = $request->get('address');
            $warehouse->area = $request->get('area');

            $warehouse->save();

            return response('Status OK', 200);
        }
        return response('Failed', 404);
    }

    public function edit(Request $request) {
        if ($request->has(['index', 'address', 'area'])) {
            $warehouse = Warehouse::find($request->get('id'));
            $warehouse->index = $request->get('index');
            $warehouse->address = $request->get('address');
            $warehouse->area = $request->get('area');

            $warehouse->save();

            return response('Status OK', 200);
        }
        return response('Failed', 404);
    }

    public function remove($id) {
        try {
            $item = Warehouse::find($id);
            $item->delete();
            return response('Status OK', 200);
        } catch (\Illuminate\Database\QueryException $ex) {
            return response('Failed: key constraint', 404);
        }
    }
}