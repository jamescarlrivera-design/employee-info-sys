<?php

namespace Database\Seeders;

use App\Models\SalaryRates;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalaryRatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SalaryRates::factory()->count(4)->create();
    }
}
