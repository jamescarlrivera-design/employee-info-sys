<?php

namespace Database\Factories;

use App\Models\SalaryRates;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SalaryRates>
 */
class SalaryRatesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rate_name' => fake()->randomElement([
                'Entry Level',
                'Junior',
                'Senior',
                'Manager',
            ]),

            'amount' => fake()->randomElement([
                15000,
                18000,
                25000,
                35000,
            ]),
        ];
    }
}
