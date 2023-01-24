<?php

namespace Saman\BarekatElectronicHealth\App\Providers;

use App\Repositories\Category\MainCategories;
use Illuminate\Support\ServiceProvider;
use Saman\BarekatElectronicHealth\App\Contract\Repositories\ICategory;

class AppRepositoriesProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ICategory::class, MainCategories::class);
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