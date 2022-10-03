<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Warehouse;

class WarehouseController extends Controller
{
    public function warehouses(){
        $warehouses = Warehouse::orderBy('id')->get();
        
        return view('warehouses/warehouses', [
            'warehouses' => $warehouses
        ]);
    }

    public function addWarehouse(Request $request) {
        if ($request->has(['index', 'address', 'area'])) {
            $warehouse = new Warehouse();
            $warehouse->index = $request->get('index');
            $warehouse->address = $request->get('address');
            $warehouse->area = $request->get('area');

            $warehouse->save();

            return redirect('/table/warehouses?success');
        }
        return redirect('/table/warehouses?fail-add');
    }

    public function editWarehouse(Warehouse $warehouse) {
        return view('warehouses/edit-warehouse', [
            'warehouse' => $warehouse
        ]);
    }

    public function editSaveWarehouse(Warehouse $warehouse, Request $request) {
        if ($request->has(['index', 'address', 'area'])) {
            $warehouse->index = $request->get('index');
            $warehouse->address = $request->get('address');
            $warehouse->area = $request->get('area');

            $warehouse->save();

            return redirect('/table/warehouses?success');
        }
        return redirect('/table/warehouses/edit/' . $warehouse->id . '?fail-save');
    }

    public function removeWarehouse(Warehouse $warehouse) {
        try {
            $warehouse->delete();
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect('/table/warehouses?fail-remove');
        }
        return redirect('/table/warehouses?remove');
    }
}
