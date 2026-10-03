<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\SalaryRates;
use App\Models\Position;
use App\Models\EmploymentStatus;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
          return [
            'employee_number' => 'EMP-' . fake()->unique()->numberBetween(1000, 9999),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'middle_name' => fake()->optional()->firstName(),
            'profile_picture' => 'profile-pictures/employee_default.jpg',
            'address' => fake()->address(),
            'department_id' => fake()->numberBetween(1, 5),
            'user_id' => User::factory(),
            'position_id' =>fake()->numberBetween(1, 5),
            'employment_status_id' =>fake()->numberBetween(1, 4),
            'salary_rate_id' =>fake()->numberBetween(1, 4),
            'date_hired' => fake()->date(),
          
        ];
    }
}
