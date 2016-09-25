<?php

namespace CodePress\CodeCategory\Providers;

use CodePress\CodeCategory\Repository\CategoryRepositoryEloquent;
use CodePress\CodeCategory\Repository\CategoryRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class CodeCategoryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../resources/migrations/' => base_path('database/migrations')
        ], 'migrations');

        $this->loadViewsFrom(__DIR__.'/../../resources/views/codecategory', 'codecategory');

        require __DIR__ .'/../../routes.php';
    }

    public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepositoryEloquent::class);
    }
}