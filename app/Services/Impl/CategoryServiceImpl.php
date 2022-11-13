<?php

namespace App\Services\Impl;

use Illuminate\Http\Request;

use App\Services\CategoryService;
use App\Models\Category;

class CategoryServiceImpl implements CategoryService {

    public function getAll() {
        $items = Category::all();

        if ( empty($items) ) {
            throw new \Exception("No info", 404);
        }

        return $items;
    }

    public function addCategory(Request $request) {
        if ($request->has(['name', 'employee_id'])) {
            $category = new Category();
            $category->name = $request->get('name');
            $category->employee_id = $request->get('employee_id');

            $category->save();

            return response('Status OK', 200);
        }
        return response('Failed', 404);
    }

    public function editCategory(Request $request) {
        if ($request->has(['name', 'employee_id'])) {
            $category = Category::find($request->get('id'));
            $category->name = $request->get('name');
            $category->employee_id = $request->get('employee_id');

            $category->save();

            return response('Status OK', 200);
        }
        return response('Failed', 404);
    }

    public function removeCategory($id) {
        try {
            $item = Category::find($id);
            $item->delete();
            return response('Status OK', 200);
        } catch (\Illuminate\Database\QueryException $ex) {
            return response('Failed: key constraint', 404);
        }
    }
}