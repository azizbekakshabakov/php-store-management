<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'auth'], function() {
    Route::get('register', [AuthController::class, 'register']);
    Route::get('login', [AuthController::class, 'auth']);
    Route::post('user/create', [AuthController::class, 'create']);
    Route::post('signin', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout']);
});

Route::get('/', [MainController::class, 'home']);

Route::get('/table/employees', [EmployeesController::class, 'employees']);
Route::post('/table/employees/add', [EmployeesController::class, 'addEmployee']);
Route::get('/table/employees/edit/{employee}', [EmployeesController::class, 'editEmployee']);
Route::post('/table/employees/edit/{employee}', [EmployeesController::class, 'editSaveEmployee']);
Route::post('/table/employees/remove/{employee}', [EmployeesController::class, 'removeEmployee']);

Route::get('/table/categories', [CategoriesController::class, 'categories']);
Route::post('/table/categories/add', [CategoriesController::class, 'addCategory']);
Route::get('/table/categories/edit/{category}', [CategoriesController::class, 'editCategory']);
Route::post('/table/categories/edit/{category}', [CategoriesController::class, 'editSaveCategory']);
Route::post('/table/categories/remove/{category}', [CategoriesController::class, 'removeCategory']);

Route::get('/table/goods', [GoodsController::class, 'goods']);
Route::post('/table/goods/add', [GoodsController::class, 'addGood']);
Route::get('/table/goods/edit/{good}', [GoodsController::class, 'editGood']);
Route::post('/table/goods/edit/{good}', [GoodsController::class, 'editSaveGood']);
Route::post('/table/goods/remove/{good}', [GoodsController::class, 'removeGood']);

Route::get('/table/sales', [SalesController::class, 'sales']);
Route::post('/table/sales/add', [SalesController::class, 'addSale']);
Route::get('/table/sales/edit/{sale}', [SalesController::class, 'editSale']);
Route::post('/table/sales/edit/{sale}', [SalesController::class, 'editSaveSale']);
Route::post('/table/sales/remove/{sale}', [SalesController::class, 'removeSale']);

Route::get('/table/suppliers', [SupplierController::class, 'suppliers']);
Route::post('/table/suppliers/add', [SupplierController::class, 'addSupplier']);
Route::get('/table/suppliers/edit/{supplier}', [SupplierController::class, 'editSupplier']);
Route::post('/table/suppliers/edit/{supplier}', [SupplierController::class, 'editSaveSupplier']);
Route::post('/table/suppliers/remove/{supplier}', [SupplierController::class, 'removeSupplier']);

Route::get('/table/warehouses', [WarehouseController::class, 'warehouses']);
Route::post('/table/warehouses/add', [WarehouseController::class, 'addWarehouse']);
Route::get('/table/warehouses/edit/{warehouse}', [WarehouseController::class, 'editWarehouse']);
Route::post('/table/warehouses/edit/{warehouse}', [WarehouseController::class, 'editSaveWarehouse']);
Route::post('/table/warehouses/remove/{warehouse}', [WarehouseController::class, 'removeWarehouse']);