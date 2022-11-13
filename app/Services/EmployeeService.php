<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Employee;

interface EmployeeService {
    public function getAll();
    public function addEmployee(Request $request);
    public function editEmployee(Request $request);
    public function removeEmployee($id);
}