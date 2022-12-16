<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

use App\Models\User;


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

        Gate::define('access', function(User $user, $action) {            
            $path = explode('.', Route::currentRouteName());            
            
            $route = $path[0].'.'.$action;
            return $user->group->modules->contains(function ($val, $key) use ($route) {                
                return Str::of($val->link)->contains([$route]);
            });
            
        });
    }
}
