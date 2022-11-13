<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\EmployeeService;
use App\Services\Impl\EmployeeServiceImpl;
use App\Services\CategoryService;
use App\Services\Impl\CategoryServiceImpl;
use App\Services\GoodService;
use App\Services\Impl\GoodServiceImpl;
use App\Services\SaleService;
use App\Services\Impl\SaleServiceImpl;
use App\Services\SupplierService;
use App\Services\Impl\SupplierServiceImpl;
use App\Services\WarehouseService;
use App\Services\Impl\WarehouseServiceImpl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EmployeeService::class, EmployeeServiceImpl::class);
        $this->app->bind(CategoryService::class, CategoryServiceImpl::class);
        $this->app->bind(GoodService::class, GoodServiceImpl::class);
        $this->app->bind(SaleService::class, SaleServiceImpl::class);
        $this->app->bind(SupplierService::class, SupplierServiceImpl::class);
        $this->app->bind(WarehouseService::class, WarehouseServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
