<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $marcas =['Bio Farma','CIMED','EMS'];
        $medications = ['Ibuprofen', 'Amoxicillin', 'Paracetamol', 'Metformin', 'Ciprofloxacin'];
        return [
            
            'name'=>$this->faker->randomElement($medications),
            'codigo'=>$this->faker->bothify('AABB??'),
            'marca'=>$this->faker->randomElement($marcas),
            'description'=> "Essa é uma descrição de produto", // texto estático
            'instruction'=> "Tomar apenas em caso de dor ou febre", // texto estático
            'recomendation'=> "Tomar apenas 1 comprimido em caso de dor ou febre", // texto estático
            'price'=>$this->faker->randomFloat(2,1,100),
            'stock'=>$this->faker->numberBetween(0,100),


        
            
        ];
    }
}
