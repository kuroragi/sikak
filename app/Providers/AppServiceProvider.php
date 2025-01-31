<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('admin', function (User $user) {
            return $user->role_slug === 'admin';
        });

        Gate::define('kaban', function (User $user) {
            return $user->role_slug === 'kaban';
        });

        Gate::define('sekretaris', function (User $user) {
            return $user->role_slug === 'sekretaris';
        });

        Gate::define('kaskpd', function (User $user) {
            return $user->role_slug === 'kaskpd';
        });

        Gate::define('askpd', function (User $user) {
            return $user->role_slug === 'askpd';
        });
    }
}
