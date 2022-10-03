<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Warehouse;

class SupplierController extends Controller
{
    public function suppliers(){
        $suppliers = Supplier::orderBy('id')->get();
        
        return view('suppliers/suppliers', [
            'suppliers' => $suppliers
        ]);
    }

    public function addSupplier(Request $request) {
        if ($request->has(['name', 'address', 'supply_date'])) {
            $supplier = new Supplier();
            $supplier->name = $request->get('name');
            $supplier->address = $request->get('address');
            $supplier->supply_date = $request->get('supply_date');

            $supplier->save();

            return redirect('/table/suppliers?success');
        }
        return redirect('/table/suppliers?fail-add');
    }

    public function editSupplier(Supplier $supplier) {
        return view('suppliers/edit-supplier', [
            'supplier' => $supplier
        ]);
    }

    public function editSaveSupplier(Supplier $supplier, Request $request) {
        if ($request->has(['name', 'address', 'supply_date'])) {
            $supplier->name = $request->get('name');
            $supplier->address = $request->get('address');
            $supplier->supply_date = $request->get('supply_date');

            $supplier->save();

            return redirect('/table/suppliers?success');
        }
        return redirect('/table/suppliers/edit/' . $supplier->id . '?fail-save');
    }

    public function removeSupplier(Supplier $supplier) {
        try {
            $supplier->delete();
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect('/table/suppliers?fail-remove');
        }
        return redirect('/table/suppliers?remove');
    }
}
