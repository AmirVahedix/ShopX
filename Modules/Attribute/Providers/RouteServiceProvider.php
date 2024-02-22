<?php

namespace Modules\Attribute\Providers;

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
        //$this->mapApiRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->group(module_path('Attribute', '/Routes/web.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::middleware(['web', 'auth:admin'])
            ->prefix('admin')
            ->name('admin.')
            ->group(module_path('Attribute', '/Routes/web_admin.php'));
    }

    private function mapApiRoutes()
    {
        Route::middleware('api')
            ->prefix('api')
            ->name('api.')
            ->group(module_path('Attribute', '/Routes/api.php'));
    }
}
