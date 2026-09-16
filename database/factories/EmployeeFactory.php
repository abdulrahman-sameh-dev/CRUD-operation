<?php

namespace Database\Factories;

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
            'title'       => $this->faker->jobTitle(),
            'department'  => $this->faker->word(),
            'salary'      => $this->faker->randomFloat(2, 3000, 50000),
            'address'     => $this->faker->address(),
            'description' => $this->faker->sentence(),
        ];
    }
}
