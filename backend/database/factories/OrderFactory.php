<?php

namespace Database\Factories;

use App\Models\Deliveries;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\Paymentmethod;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{   
    protected $model = Order::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $id_order =1;
        return [
            
            'id'=>$id_order++, #Id da compra 
            'id_cliente'=>User::factory(),
            'dt'=>$this->faker->dateTime,
            'id_payment_method'=>Paymentmethod::factory(),// Cria um Paymentmethod e usa seu id buscado factory Paymentmethod 
            'id_recipe'=>$this->faker->numberBetween(1,4),
            'id_delivery'=>Deliveries::factory(),

        ];
    }
}
