<?php

namespace Database\Seeders;

use App\Models\Deliveries;
use Illuminate\Database\Seeder;

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
