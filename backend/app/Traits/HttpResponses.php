<?php #Indica que o arquivo é um código em php

#Esse arquivo padroniza a comunicação em Laravel e auxilia no retorno de mensagens.
namespace App\Traits;

use Illuminate\Contracts\Support\MessageBag; #Utilizado para apresentar erros de validação
use Illuminate\Database\Eloquent\Model; #Modelo padrão para arquivos Eloquent
use Illuminate\Http\Resources\Json\JsonResource; #Classe para transformar modelos Json.

trait HttpResponses
{
#Cria uma resposta que vai devolver uma mensagem com o código http e algum dado.
  public function response(string $message, string|int $status, array|Model|JsonResource $data = [])
  {
    #Formata em json os parâmetros recebidos
    return response()->json([
      'message' => $message,
      'status' => $status,
      'data' => $data
    ], $status);
  }
  #Devolve o erros formatados.
  public function error(string $message, string|int $status, array|MessageBag $errors = [], array $data = [])
  {
    return response()->json([
      'message' => $message,
      'status' => $status,
      'errors' => $errors,
      'data' => $data
    ], $status);
  }
}