<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            if ($user->role == 'admin') {
                return true;
            } else {
                return false;
            }
        });

        Gate::define('user', function ($user) {
            if ($user->role == 'user') {
                return true;
            } else {
                return false;
            }
        });

        Gate::define('uitleendienst', function ($user) {
            if ($user->role == 'uitleendienst') {
                return true;
            } else {
                return false;
            }
        });

        //
    }
}
