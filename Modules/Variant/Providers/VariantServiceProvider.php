<?php

namespace Modules\Variant\Providers;

use Illuminate\Support\ServiceProvider;

class VariantServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'Variant';

    public function boot()
    {
        $this->registerTranslations();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
    }

    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    public function registerViews()
    {
        $this->loadViewsFrom(module_path($this->moduleName, 'Resources/views'), $this->moduleName);
    }

    public function registerTranslations()
    {
        $this->loadJsonTranslationsFrom(module_path($this->moduleName, 'Resources/lang'));
    }
}
