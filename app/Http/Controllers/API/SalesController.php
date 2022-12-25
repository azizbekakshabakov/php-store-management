<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SaleService;
use App\Http\Resources\SaleResource;

class SalesController extends Controller
{
    protected $itemService;

    public function __construct(SaleService $itemService) {
        $this->itemService = $itemService;
    }

    public function index() {
        try {
            $items = $this->itemService->getAll();

            return response()->json([
                'status' => true,
                'items' => SaleResource::collection($items)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], $e->getCode());
        }
    }

    public function getOne($id) {
        $response = new SaleResource($this->itemService->getOne($id));

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
