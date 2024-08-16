<?php

namespace Database\Seeders;

use App\Models\Deliveries;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DeliveriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Deliveries::factory()->count(10)->create();
        
    }
}
