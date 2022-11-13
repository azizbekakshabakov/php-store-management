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

Route::get('/employees', [\App\Http\Controllers\API\EmployeesController::class, 'index']);
Route::post('/employees', [\App\Http\Controllers\API\EmployeesController::class, 'post']);
Route::put('/employees', [\App\Http\Controllers\API\EmployeesController::class, 'put']);
Route::delete('/employees/{id}', [\App\Http\Controllers\API\EmployeesController::class, 'delete']);

Route::get('/categories', [\App\Http\Controllers\API\CategoriesController::class, 'index']);
Route::post('/categories', [\App\Http\Controllers\API\CategoriesController::class, 'post']);
Route::put('/categories', [\App\Http\Controllers\API\CategoriesController::class, 'put']);
Route::delete('/categories/{id}', [\App\Http\Controllers\API\CategoriesController::class, 'delete']);

Route::get('/goods', [\App\Http\Controllers\API\GoodsController::class, 'index']);
Route::post('/goods', [\App\Http\Controllers\API\GoodsController::class, 'post']);
Route::put('/goods', [\App\Http\Controllers\API\GoodsController::class, 'put']);
Route::delete('/goods/{id}', [\App\Http\Controllers\API\GoodsController::class, 'delete']);

Route::get('/sales', [\App\Http\Controllers\API\SalesController::class, 'index']);
Route::post('/sales', [\App\Http\Controllers\API\SalesController::class, 'post']);
Route::put('/sales', [\App\Http\Controllers\API\SalesController::class, 'put']);
Route::delete('/sales/{id}', [\App\Http\Controllers\API\SalesController::class, 'delete']);

Route::get('/suppliers', [\App\Http\Controllers\API\SuppliersController::class, 'index']);
Route::post('/suppliers', [\App\Http\Controllers\API\SuppliersController::class, 'post']);
Route::put('/suppliers', [\App\Http\Controllers\API\SuppliersController::class, 'put']);
Route::delete('/suppliers/{id}', [\App\Http\Controllers\API\SuppliersController::class, 'delete']);

Route::get('/warehouses', [\App\Http\Controllers\API\WarehousesController::class, 'index']);
Route::post('/warehouses', [\App\Http\Controllers\API\WarehousesController::class, 'post']);
Route::put('/warehouses', [\App\Http\Controllers\API\WarehousesController::class, 'put']);
Route::delete('/warehouses/{id}', [\App\Http\Controllers\API\WarehousesController::class, 'delete']);