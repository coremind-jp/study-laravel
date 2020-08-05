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

        $this->registerGates();
    }

    public function registerGates()
    {
        Gate::define('admin-only', 'App\Policies\GatePolicy@adminOnly');
        Gate::define('chief-higher', 'App\Policies\GatePolicy@chiefHigher');
        Gate::define('user-higher', 'App\Policies\GatePolicy@userHigher');
    }
}
