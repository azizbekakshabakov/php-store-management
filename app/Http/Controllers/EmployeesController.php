<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeesController extends Controller
{
    public function employees(){
        $employees = Employee::orderBy('id')->get();
        
        return view('employees/employees', [
            'employees' => $employees
        ]);
    }

    public function addEmployee(Request $request) {
        if ($request->has(['name', 'surname', 'salary', 'experience'])) {
            $employee = new Employee();
            $employee->name = $request->get('name');
            $employee->surname = $request->get('surname');
            $employee->salary = $request->get('salary');
            $employee->experience = $request->get('experience');

            $employee->save();

            return redirect('/table/employees?success');
        }
        return redirect('/table/employees?fail-add');
    }

    public function editEmployee(Employee $employee) {
        return view('employees/edit-employee', [
            'employee' => $employee
        ]);
    }

    public function editSaveEmployee(Employee $employee, Request $request) {
        if ($request->has(['name', 'surname', 'salary', 'experience'])) {
            $employee->name = $request->get('name');
            $employee->surname = $request->get('surname');
            $employee->salary = $request->get('salary');
            $employee->experience = $request->get('experience');

            $employee->save();

            return redirect('/table/employees?success');
        }
        return redirect('/table/employees/edit/' . $employee->id . '?fail-save');
    }

    public function removeEmployee(Employee $employee) {
        try {
            $employee->delete();
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect('/table/employees?fail-remove');
        }
        return redirect('/table/employees?remove');
    }
}