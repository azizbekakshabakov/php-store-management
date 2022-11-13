<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Category;

interface WarehouseService {
    public function getAll();
    public function add(Request $request);
    public function edit(Request $request);
    public function remove($id);
}