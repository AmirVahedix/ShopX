<?php

namespace Modules\Address\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapWebRoutes();
        //$this->mapAdminRoutes();
        $this->mapApiRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->group(module_path('Address', '/Routes/web.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::middleware(['web', 'auth:admin'])
            ->prefix('admin')
            ->name('admin.')
            ->group(module_path('Address', '/Routes/web_admin.php'));
    }

    protected function mapApiRoutes()
    {
        Route::middleware('api')
            ->prefix('api')
            ->name('api.')
            ->group(module_path('Address', '/Routes/api.php'));
    }
}
