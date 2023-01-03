<?php

namespace App\Providers;

use Inertia\Inertia;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Auth;

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

        Inertia::share([
            'user_permission' => function () {
                $permissions = [];
                if (Auth::check()):
                    $col_permissions = auth()->user()->getAllPermissions();
                    $permissions = $col_permissions->map(function ($item, $key) {
                        return $item->name;
                    });    
                endif;            
                return $permissions;
            }
        ]);

        Inertia::share([
            'errors' => function () {
                return Session::get('errors') ? Session::get('errors')->getBag('default')-> getMessages() : (object) [];
            }
        ]);

        Inertia::share('flash', function () {
                return [
                    'message'   => Session::get('message')
                ];
            }
        );

        Inertia::share('csrf_token', function () {
            return csrf_token();
        }
    );
    }
}
