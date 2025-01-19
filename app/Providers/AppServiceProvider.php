<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Configuration\Middleware;
use Filament\Http\Responses\Auth\Contracts\RegistrationResponse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            RegistrationResponse::class, 
            \App\Http\Responses\RegisterResponse::class,
            \App\Providers\Filament\AdminPanelProvider::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // // Filament::panel()->default('filament.pages.dashboard');
        // $kernel = app(\Illuminate\Contracts\Http\Kernel::class);
        // $kernel->pushMiddleware(RoleBasedRedirect::class);    
        }
}
