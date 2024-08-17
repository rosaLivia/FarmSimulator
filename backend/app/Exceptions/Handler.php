<?php

/*
Descrição: Arquivo responsável por centralizar o tratamento erros automaticamente.

Exemplo: Se der erro x execute código y.
*/

namespace App\Exceptions; #Define qual será o escopo de atuação das variáveis desse código


#Importa classes que serão usadas ao longo do código.
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;


#Criação da classe
class Handler extends ExceptionHandler #Cria a classe Handler herdando as propriedades da classe ExceptionHandler
{
    #Cria uma função para jamais deixar vazarem determinadas informações em caso de exceção.
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    #Cria uma função que retorna callbacks após determinadas ações de tratamentos de erros.
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}