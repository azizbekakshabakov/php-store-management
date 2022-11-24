<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Resources\CategoryResource;

class CategoriesController extends Controller
{
    protected $itemService;

    public function __construct(CategoryService $itemService) {
        $this->itemService = $itemService;
    }

    public function index() {
        try {
            $items = $this->itemService->getAll();

            return response()->json([
                'status' => true,
                'categories' => CategoryResource::collection($items)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], $e->getCode());
        }
    }

    public function getOne($id) {
        $response = new CategoryResource($this->itemService->getOne($id));

        return $response;
    }

    public function post(Request $request) {
        $response = $this->itemService->addCategory($request);

        return $response;
    }

    public function put(Request $request) {
        $response = $this->itemService->editCategory($request);

        return $response;
    }

    public function delete($id) {
        $response = $this->itemService->removeCategory($id);

        return $response;
    }
}
