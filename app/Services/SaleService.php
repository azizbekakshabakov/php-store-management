<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Category;

interface SaleService {
    public function getAll();
    public function getOne($id);
    public function add(Request $request);
    public function edit(Request $request);
    public function remove($id);
}