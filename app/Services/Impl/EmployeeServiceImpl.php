<?php

namespace App\Services\Impl;

use Illuminate\Http\Request;

use App\Services\EmployeeService;
use App\Models\Employee;

class EmployeeServiceImpl implements EmployeeService {

    public function getAll() {
        $employees = Employee::all();

        if ( empty($employees) ) {
            throw new \Exception("No info", 404);
        }

        return $employees;
    }

    public function addEmployee(Request $request) {
        if ($request->has(['name', 'surname', 'salary', 'experience']) && $request->hasFile('image')) {
            $employee = new Employee();
            $employee->name = $request->get('name');
            $employee->surname = $request->get('surname');
            $employee->salary = $request->get('salary');
            $employee->experience = $request->get('experience');
            $url = $request->file('image')->store('images');
            $employee->image = $url;

            $employee->save();

            return response('Status OK', 200);
        }
        return response('Failed', 404);
    }

    public function editEmployee(Request $request) {
        if ($request->has(['id', 'name', 'surname', 'salary', 'experience'])) {
            $employee = Employee::find($request->get('id'));
            $employee->name = $request->get('name');
            $employee->surname = $request->get('surname');
            $employee->salary = $request->get('salary');
            $employee->experience = $request->get('experience');
            $url = $request->file('image')->store('images');
            $employee->image = $url;

            $employee->save();

            return response('Status OK', 200);
        }
        return response('Failed', 404);
    }

    public function removeEmployee($id) {
        try {
            $employee = Employee::find($id);
            $employee->delete();
            return response('Status OK', 200);
        } catch (\Illuminate\Database\QueryException $ex) {
            return response('Failed: key constraint', 404);
        }
    }
}