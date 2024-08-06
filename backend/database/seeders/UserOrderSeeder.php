<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Order;

class UserOrderSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar um novo usuário
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'cpf' => '12345678900',
            'phone' => '1234567890',
            'address' => '123 Main St',
            'password' => bcrypt('password'),
            'terms_accepted' => true,
        ]);

        // Criar um novo pedido associado ao usuário
        Order::create([
            'user_id' => $user->id,
            'dt' => now(),
            'id_payment_method' => 1,
            'id_recipe' => 1,
            'id_entrega' => 1,
        ]);
    }
}
