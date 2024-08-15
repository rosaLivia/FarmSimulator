<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cart;
use App\Models\Deliveries;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //User::factory()->create([
          //  'name' => 'Test User',
            //'email' => 'test@example.com',
        //])


        // 1) Popular a tabela User
        $this->call(UserSeeder::class);
        // 2) Popular a tabela Paymentmethod
        $this->call(PaymentmethodSeeder::class);
        // 3) Popular a tabela Order
        $this->call(OrderSeeder::class);
        // 4) Popular a tabela Employees
        $this->call(EmployeesSeeder::class);
        // 5) Popular a tabela Deliveries
        $this->call(DeliveriesSeeder::class);
        // 6) Popular a tabela Product
        $this->call(ProductSeeder::class);
        // 7) Popular a tabela Cart
        $this->call(CartSeeder::class);
        // 8) Popular a tabela Recipe
        $this->call(RecipeSeeder::class);
        
    }
}
