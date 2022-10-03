<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Good;
use App\Models\Sale;
use App\Models\Supplier;
use App\Models\Warehouse;

class GoodsController extends Controller
{
    
    public function goods(){
        $goods = Good::orderBy('id')->with('category')->with('supplier')->with('warehouse')->get();
        $categories = Category::orderBy('id')->get();
        $suppliers = Supplier::orderBy('id')->get();
        $warehouses = Warehouse::orderBy('id')->get();
        
        return view('goods/goods', [
            'goods' => $goods,
            'categories' => $categories,
            'suppliers' => $suppliers,
            'warehouses' => $warehouses
        ]);
    }

    public function addGood(Request $request) {
        if ($request->has(['name', 'quantity', 'category_id', 'supplier_id', 'warehouse_id'])) {
            $good = new Good();
            $good->name = $request->get('name');
            $good->quantity = $request->get('quantity');
            $good->category_id = $request->get('category_id');
            $good->supplier_id = $request->get('supplier_id');
            $good->warehouse_id = $request->get('warehouse_id');

            $good->save();

            return redirect('/table/goods?success');
        }
        return redirect('/table/goods?fail-add');
    }

    public function editGood(Good $good) {
        $goods = Good::orderBy('id')->with('category')->with('supplier')->with('warehouse')->get();
        $categories = Category::orderBy('id')->get();
        $suppliers = Supplier::orderBy('id')->get();
        $warehouses = Warehouse::orderBy('id')->get();

        return view('goods/edit-good', [
            'good' => $good,
            'categories' => $categories,
            'suppliers' => $suppliers,
            'warehouses' => $warehouses
        ]);
    }

    public function editSaveGood(Good $good, Request $request) {
        if ($request->has(['name', 'quantity', 'category_id', 'supplier_id', 'warehouse_id'])) {
            $good->name = $request->get('name');
            $good->quantity = $request->get('quantity');
            $good->category_id = $request->get('category_id');
            $good->supplier_id = $request->get('supplier_id');
            $good->warehouse_id = $request->get('warehouse_id');

            $good->save();

            return redirect('/table/goods?success');
        }
        return redirect('/table/goods/edit/' . $good->id . '?fail-save');
    }

    public function removeGood(Good $good) {
        try {
            $good->delete();
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect('/table/goods?fail-remove');
        }
        return redirect('/table/goods?remove');
    }
}
