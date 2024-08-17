<?php
/*
Descrição:
Arquivo responsável por definir a hierarquia de permissões de cada token.
*/
namespace App\Policies; //Define o escopo de atuação das declarações feitas no código

//Import de classes necessárias para o funcionamento do código
use App\Models\User; //Import do modelo de users 
use Illuminate\Auth\Access\HandlesAuthorization; //Import da classe responsável por delegar autorizações.

//Declaração de classe
class AccessPolicy
{
    use HandlesAuthorization;

    public function admin(User $user)
    {
        return $user->tokenCan('admin');
    }

    public function employeer(User $user)
    {
        return $user->tokenCan('admin') || $user->tokenCan('employeer');
    }

    public function user(User $user)
    {
        return $user->tokenCan('admin') || $user->tokenCan('employeer') || $user->tokenCan('user');
    }
}
