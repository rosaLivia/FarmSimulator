<?php

/*
Descrição:
Verifica se o usuário está autenticado, caso não, o manda para a tela de login
*/

namespace App\Http\Middleware; #Define o escopo das variáveis que irão ser usadas nesse código.

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}