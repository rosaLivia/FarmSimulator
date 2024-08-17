<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Referenciando a tabela Cart
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = Order::first();
        $product = Product::first();
        Cart::factory()->count(10)->create([
            'id_order'=> $order->id,
            'id_product'=> $product->id,
            
            
      
        ]);
       
        
    }

    
}
