<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Drewlabs\AuthHttpGuard\HttpGuardGlobals;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Configure the Http-Guard library to use cache
        HttpGuardGlobals::usesCache(true);
        // Configure the http-guard library to use PHP 'memcached' storage as default driver
        HttpGuardGlobals::useCacheDriver('memcached');
        //

        HttpGuardGlobals::userPath('auth/v2/user'); // Set the api prefix to equal auth instead of api
        HttpGuardGlobals::revokePath('auth/v2/logout');
    }
}
