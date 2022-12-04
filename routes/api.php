<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/employees', [\App\Http\Controllers\API\EmployeesController::class, 'index'])->middleware('auth:api');
Route::get('/employees/{id}', [\App\Http\Controllers\API\EmployeesController::class, 'getOne'])->middleware('auth:api');
Route::post('/employees', [\App\Http\Controllers\API\EmployeesController::class, 'post'])->middleware(['auth:api', 'admin']);
Route::put('/employees', [\App\Http\Controllers\API\EmployeesController::class, 'put'])->middleware('auth:api');
Route::delete('/employees/{id}', [\App\Http\Controllers\API\EmployeesController::class, 'delete'])->middleware('auth:api');

Route::get('/categories', [\App\Http\Controllers\API\CategoriesController::class, 'index'])->middleware('auth:api');
Route::get('/categories/{id}', [\App\Http\Controllers\API\CategoriesController::class, 'getOne'])->middleware('auth:api');
Route::post('/categories', [\App\Http\Controllers\API\CategoriesController::class, 'post'])->middleware('auth:api');
Route::put('/categories', [\App\Http\Controllers\API\CategoriesController::class, 'put'])->middleware('auth:api');
Route::delete('/categories/{id}', [\App\Http\Controllers\API\CategoriesController::class, 'delete'])->middleware('auth:api');

Route::get('/goods', [\App\Http\Controllers\API\GoodsController::class, 'index'])->middleware('auth:api');
Route::get('/goods/{id}', [\App\Http\Controllers\API\GoodsController::class, 'getOne'])->middleware('auth:api');
Route::post('/goods', [\App\Http\Controllers\API\GoodsController::class, 'post'])->middleware('auth:api');
Route::put('/goods', [\App\Http\Controllers\API\GoodsController::class, 'put'])->middleware('auth:api');
Route::delete('/goods/{id}', [\App\Http\Controllers\API\GoodsController::class, 'delete'])->middleware('auth:api');

Route::get('/sales', [\App\Http\Controllers\API\SalesController::class, 'index'])->middleware('auth:api');
Route::get('/sales/{id}', [\App\Http\Controllers\API\SalesController::class, 'getOne'])->middleware('auth:api');
Route::post('/sales', [\App\Http\Controllers\API\SalesController::class, 'post'])->middleware('auth:api');
Route::put('/sales', [\App\Http\Controllers\API\SalesController::class, 'put'])->middleware('auth:api');
Route::delete('/sales/{id}', [\App\Http\Controllers\API\SalesController::class, 'delete'])->middleware('auth:api');

Route::get('/suppliers', [\App\Http\Controllers\API\SuppliersController::class, 'index'])->middleware('auth:api');
Route::get('/suppliers/{id}', [\App\Http\Controllers\API\SuppliersController::class, 'getOne'])->middleware('auth:api');
Route::post('/suppliers', [\App\Http\Controllers\API\SuppliersController::class, 'post'])->middleware('auth:api');
Route::put('/suppliers', [\App\Http\Controllers\API\SuppliersController::class, 'put'])->middleware('auth:api');
Route::delete('/suppliers/{id}', [\App\Http\Controllers\API\SuppliersController::class, 'delete'])->middleware('auth:api');

Route::get('/warehouses', [\App\Http\Controllers\API\WarehousesController::class, 'index'])->middleware('auth:api');
Route::get('/warehouses/{id}', [\App\Http\Controllers\API\WarehousesController::class, 'getOne'])->middleware('auth:api');
Route::post('/warehouses', [\App\Http\Controllers\API\WarehousesController::class, 'post'])->middleware('auth:api');
Route::put('/warehouses', [\App\Http\Controllers\API\WarehousesController::class, 'put'])->middleware('auth:api');
Route::delete('/warehouses/{id}', [\App\Http\Controllers\API\WarehousesController::class, 'delete'])->middleware('auth:api');

Route::post('/register', [\App\Http\Controllers\API\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\API\AuthController::class, 'login']);

// Route::post('/register', [\App\Http\Controllers\API\AuthApiController::class, 'register']);
// Route::post('/login', [\App\Http\Controllers\API\AuthApiController::class, 'login']);
