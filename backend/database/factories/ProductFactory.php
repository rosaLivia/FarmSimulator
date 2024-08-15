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
        return [
            $medications = ['Ibuprofen', 'Amoxicillin', 'Paracetamol', 'Metformin', 'Ciprofloxacin'],
            'name'=>$this->faker->randomElements($medications),
            'codigo'=>$this->faker->bothify('AABB??'),
            $marcas =['Bio Farma','CIMED','EMS'],
            'descricao'=> $this->faker->text("Essa é uma descrição de produto"), // O parâmetro `200` indica o número de caracteres.
            'instrucao'=> $this->faker->text("Tomar apenas em caso de dor ou febre"), 
            'valor'=>$this->faker->randomFloat(2,1,50),
            'Q_estoque'=>$this->faker->random_int(0,100)


        
            
        ];
    }
}
