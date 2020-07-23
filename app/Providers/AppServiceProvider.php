<?php

namespace App\Providers;
use App\Models\{
    Category,
    Plan,
    Tenant
};
use App\Observers\CategoryObserver;
use App\Observers\PlanObserver;
use App\Observers\TenantObsever;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Plan::observe(PlanObserver::class);
        Tenant::observe(TenantObsever::class);
        Category::observe(CategoryObserver::class);
    }
}
