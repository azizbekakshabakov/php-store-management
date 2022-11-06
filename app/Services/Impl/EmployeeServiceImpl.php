<?php

namespace App\Services\Impl;

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
}