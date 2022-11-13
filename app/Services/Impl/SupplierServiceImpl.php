<?php

namespace App\Services\Impl;

use Illuminate\Http\Request;

use App\Services\SupplierService;
use App\Models\Supplier;

class SupplierServiceImpl implements SupplierService {

    public function getAll() {
        $items = Supplier::all();

        if ( empty($items) ) {
            throw new \Exception("No info", 404);
        }

        return $items;
    }

    public function add(Request $request) {
        if ($request->has(['name', 'address', 'supply_date'])) {
            $supplier = new Supplier();
            $supplier->name = $request->get('name');
            $supplier->address = $request->get('address');
            $supplier->supply_date = $request->get('supply_date');

            $supplier->save();

            return response('Status OK', 200);
        }
        return response('Failed', 404);
    }

    public function edit(Request $request) {
        if ($request->has(['name', 'address', 'supply_date'])) {
            $supplier = Supplier::find($request->get('id'));
            $supplier = new Supplier();
            $supplier->name = $request->get('name');
            $supplier->address = $request->get('address');
            $supplier->supply_date = $request->get('supply_date');

            $supplier->save();

            return response('Status OK', 200);
        }
        return response('Failed', 404);
    }

    public function remove($id) {
        try {
            $item = Supplier::find($id);
            $item->delete();
            return response('Status OK', 200);
        } catch (\Illuminate\Database\QueryException $ex) {
            return response('Failed: key constraint', 404);
        }
    }
}