<?php

namespace App\Providers;

use App\Models\Customer;
use App\Models\WaterBill;
use App\Models\WaterBillUnit;
use App\Policies\CustomerPolicy;
use App\Policies\WaterBillPolicy;
use App\Policies\WaterBillUnitPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Customer::class, CustomerPolicy::class);
        Gate::policy(WaterBill::class, WaterBillPolicy::class);
        Gate::policy(WaterBillUnit::class, WaterBillUnitPolicy::class);
    }
}
