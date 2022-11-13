<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Category;

interface CategoryService {
    public function getAll();
    public function addCategory(Request $request);
    public function editCategory(Request $request);
    public function removeCategory($id);
}