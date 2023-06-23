<?php

namespace App\Providers;

use App\Models\Scopes\OrganizationScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

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
        Builder::macro('organization', function () {
            return $this->withoutGlobalScope(OrganizationScope::class);
        });
    }
}
