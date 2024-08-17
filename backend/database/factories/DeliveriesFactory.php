<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deliveries>
 */
class DeliveriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $date = $this->faker->dateTimeThisYear(); // Gera uma data aleatória deste ano
        return [
           
            'deliveries'=>$this->faker->date(),
            'codigo'=>$this->faker->bothify('??###??'),
            'arrived_date'=>Carbon::instance($date)->addDays(7), // Adiciona 7 dias à data gerada

        ];
    }
}
