<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Good;
use App\Models\Sale;
use App\Models\Supplier;
use App\Models\Warehouse;

class CategoriesController extends Controller
{
    public function categories(){
        $categories = Category::orderBy('id')->with('employee')->get();
        $employees = Employee::orderBy('id')->get();
        
        return view('categories/categories', [
            'categories' => $categories,
            'employees' => $employees
        ]);
    }

    public function addCategory(Request $request) {
        if ($request->has(['name', 'employee_id'])) {
            $category = new Category();
            $category->name = $request->get('name');
            $category->employee_id = $request->get('employee_id');

            $category->save();

            return redirect('/table/categories?success');
        }
        return redirect('/table/categories?fail-add');
    }

    public function editCategory(Category $category) {
        $employees = Employee::orderBy('id')->get();

        return view('categories/edit-category', [
            'category' => $category,
            'employees' => $employees
        ]);
    }

    public function editSaveCategory(Category $category, Request $request) {
        if ($request->has(['name', 'employee_id'])) {
            $category->name = $request->get('name');
            $category->employee_id = $request->get('employee_id');

            $category->save();

            return redirect('/table/categories?success');
        }
        return redirect('/table/categories/edit/' . $category->id . '?fail-save');
    }

    public function removeCategory(Category $category) {
        try {
            $category->delete();
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect('/table/categories?fail-remove');
        }
        return redirect('/table/categories?remove');
    }
}
