<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Deliveries;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Cria 10 registros na tabela orders com chave estrangeira para deliveries
        Order::factory()->count(10)->create([
            'id_entrega' => Deliveries::inRandomOrder()->first()->id,
            
        ]);
    }
    
}
