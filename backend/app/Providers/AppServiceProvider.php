<?php

/*
Descrição:
Definição de politicas para token
*/

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Sanctum\Sanctum;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPolicies();

        // Definindo permissões
        Gate::define('user', function ($user) {
            return $user->tokenCan('user');
        });

        Gate::define('employeer', function ($user) {
            return $user->tokenCan('employeer') || $user->tokenCan('admin');
        });

        Gate::define('admin', function ($user) {
            return $user->tokenCan('admin');
        });
    }
}

