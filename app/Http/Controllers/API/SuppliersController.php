<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SupplierService;
use App\Http\Resources\SupplierResource;

class SuppliersController extends Controller
{
    protected $itemService;

    public function __construct(SupplierService $itemService) {
        $this->itemService = $itemService;
    }

    public function index() {
        try {
            $items = $this->itemService->getAll();

            return response()->json([
                'status' => true,
                'items' => SupplierResource::collection($items)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], $e->getCode());
        }
    }

    public function getOne($id) {
        $response = new SupplierResource($this->itemService->getOne($id));

        return $response;
    }

    public function post(Request $request) {
        $response = $this->itemService->add($request);

        return $response;
    }

    public function put(Request $request) {
        $response = $this->itemService->edit($request);

        return $response;
    }

    public function delete($id) {
        $response = $this->itemService->remove($id);

        return $response;
    }
}
