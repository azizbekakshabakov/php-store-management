<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Good;
use App\Models\Sale;
use App\Models\Supplier;
use App\Models\Warehouse;

class SalesController extends Controller
{
    public function sales(){
        $sales = Sale::orderBy('id')->with('good')->get();
        $goods = Good::orderBy('id')->get();
        
        return view('sales/sales', [
            'sales' => $sales,
            'goods' => $goods
        ]);
    }

    public function addSale(Request $request) {
        if ($request->has(['quantity', 'good_id'])) {
            $sale = new Sale();
            $sale->quantity = $request->get('quantity');
            $sale->good_id = $request->get('good_id');

            $sale->save();

            return redirect('/table/sales?success');
        }
        return redirect('/table/sales?fail-add');
    }

    public function editSale(Sale $sale) {
        $goods = Good::orderBy('id')->get();

        return view('sales/edit-sale', [
            'sale' => $sale,
            'goods' => $goods
        ]);
    }

    public function editSaveSale(Sale $sale, Request $request) {
        if ($request->has(['quantity', 'good_id'])) {
            $sale->quantity = $request->get('quantity');
            $sale->good_id = $request->get('good_id');

            $sale->save();

            return redirect('/table/sales?success');
        }
        return redirect('/table/sales/edit/' . $save->id . '?fail-save');
    }

    public function removeSale(Sale $sale) {
        try {
            $sale->delete();
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect('/table/sales?fail-remove');
        }
        return redirect('/table/sales?remove');
    }
}
