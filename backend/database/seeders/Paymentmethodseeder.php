<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paymentmethod;


class Paymentmethodseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Paymentmethod::factory()->count(10)->create();
    }
}
