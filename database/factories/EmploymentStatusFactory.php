<?php

namespace Database\Factories;

use App\Models\EmploymentStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<EmploymentStatus>
 */
class EmploymentStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       return [
           
              'employment_status' => fake()->unique()->randomElement([
                'Contractual',
                'Probationary',
                'Regular',
                'Resigned',
                
               
            ]),
       ];
    }
}
