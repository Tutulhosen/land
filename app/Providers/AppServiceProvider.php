<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Admin\SystemConfiguration\CompanyInformation;

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
       // Check if the system is in setup mode
        if (!env('APP_INSTALLED', false)) {
            View::share('companyInformation', null);
            return;
        }

        try {
            // Check if database connection is available
            DB::connection()->getPdo();

            // Ensure the company_information table exists before querying
            if (Schema::hasTable('company_information')) {
                $companyInformation = CompanyInformation::with('contactInformation', 'brandSetting', 'applicationSetting', 'companyDocument')->first();
                View::share('companyInformation', $companyInformation ?? null);
            } else {
                View::share('companyInformation', null);
            }
        } catch (\Exception $e) {
            View::share('companyInformation', null);
        }
    }
}
