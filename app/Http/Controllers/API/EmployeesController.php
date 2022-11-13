<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EmployeeService;

class EmployeesController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService) {
        $this->employeeService = $employeeService;
    }

    public function index() {
        try {
            $employees = $this->employeeService->getAll();

            return response()->json([
                'status' => true,
                'employees' => $employees
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], $e->getCode());
        }
    }

    public function post(Request $request) {
        $response = $this->employeeService->addEmployee($request);

        return $response;
    }

    public function put(Request $request) {
        $response = $this->employeeService->editEmployee($request);

        return $response;
    }

    public function delete($id) {
        $response = $this->employeeService->removeEmployee($id);

        return $response;
    }
}
