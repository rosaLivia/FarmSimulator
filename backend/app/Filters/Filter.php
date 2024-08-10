<?php

/*
Descrição:
Define filtros que ajustam as consultas do eloquent para serem legiveis para sql

Exemplo:
"Me mostra a tabela dos produtos" -> "From products show *"
*/

namespace App\Filters; #Define o escopo de atuação das variáveis desse código.


#Declaração de classes que serão usadas ao longo do código.
use DeepCopy\Exception\PropertyException;
use Exception;
use Illuminate\Http\Request;

#Criação de uma classe
abstract class Filter #Declara um classe sem nome que irá herdar propriedades da classe Filter
{
  #Vai criar um array que não poderá ser acessado fora desse código
  protected array $allowedOperatorsFields = [];

  #Vai criar um array que não poderá ser acessado fora desse código
  protected array $transalateOperatorsFields = [
    'gt' => '>',
    'gte' => '>=',
    'lt' => '<',
    'lte' => '<=',
    'eq' => '=',
    'ne' => '!=',
    'in' => 'in',
  ];

  #Vai criar uma função chamada filter que poderá ser acessada fora desse código
  public function filter(Request $request)
  {
    $where = [];
    $whereIn = [];

    if (empty($this->allowedOperatorsFields)) {
      throw new PropertyException("Property allowedOperatorsfields is empty");
    }

    foreach ($this->allowedOperatorsFields as $param => $operators) {
      $queryOperator = $request->query($param);
      if ($queryOperator) {
        foreach ($queryOperator as $operator => $value) {
          if (!in_array($operator, $operators)) {
            throw new Exception("{$param} does not have {$operator} operator");
          }

          if (str_contains($value, '[')) {
            $whereIn[] = [
              $param,
              explode(',', str_replace(['[', ']'], ['', ''], $value)),
              $value
            ];
          } else {
            $where[] = [
              $param,
              $this->transalateOperatorsFields[$operator],
              $value
            ];
          }
        }
      }
    }

    if (empty($where) && empty($whereIn)) {
      return [];
    }

    return [
      'where' => $where,
      'whereIn' => $whereIn
    ];
  }
}