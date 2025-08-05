<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
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
        $positions = ['Manager', 'Staff'];
        $departments = ['IST', 'Admin', 'HR', 'Accounting', 'Membership', 'MarComm'];

        return [
            'employee_firstname' => $this->faker->firstName(),
            'employee_middlename' => $this->faker->boolean(80) ? $this->faker->firstName() : null,
            'employee_lastname' => $this->faker->lastName(),
            'employee_email' => $this->faker->unique()->safeEmail(),
            'employee_address' => $this->faker->address(),
            'employee_position' => $this->faker->randomElement($positions),
            'employee_department' => $this->faker->randomElement($departments),
            'employee_contact_number' => $this->faker->phoneNumber(),
            'employee_status' => true,
        ];
    }
}
