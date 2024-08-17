<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Employees;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employees::factory()->count(10)->create();
    }
}
