<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cart;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Cart::class;

    public function definition(): array
    {
        return [
            'id_buy'=> $this->faker->numberBetween(1,100),
            'id_drug'=> $this->faker->numberBetween(1,100),
            'quant'=> $this->faker->numberBetween(1,100),
            //'price'=> $this->faker->randomFloat(2,1,100),
            'preco_unitario'=>$this->faker->randomFloat(2,1,50),
            

        ];
    }
}
