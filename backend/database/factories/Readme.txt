*As factories são usadas para gerar dados fictícios para suas tabelas de banco de dados.
Elas ajudam a criar registros de teste para seus modelos de forma rápida e fácil.*

1) Use o comando Artisan para gerar uma factory para o modelo 'QualquerModeloQueVoceQuiser':

./vendor/bin/sail artisan make:factory QualquerModeloQueVoceQuiserFactory --model= QualquerModeloQueVoceQuiser


2) No arquivo CartFactory.php, você define como os dados fictícios serão gerados. Por exemplo:


<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\QualquerModeloQueVoceQuiserFactory;

class CartFactory extends Factory
{
    protected $model = Cart::class;

    public function definition()
    {
        return [
            'id_buy' => $this->faker->numberBetween(1, 100),
            'id_drug' => $this->faker->numberBetween(1, 100),
            'quant' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}


faker é uma biblioteca que gera dados aleatórios para você. Você pode ajustar os tipos e intervalos dos dados gerados conforme necessário.


