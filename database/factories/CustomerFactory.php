<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Generate the current date and add a random number of days between 1 and 30 to get a date between April 2025 and May 2025
        $birthdate = $this->faker->dateTimeBetween('1960-01-01', '2015-12-31')->format('Y-m-d');

        return [
            'customer_firstname' => $this->faker->firstName,
            'customer_middlename' => $this->faker->optional()->firstName, 
            'customer_surname' => $this->faker->lastName,
            'customer_email' => $this->faker->unique()->safeEmail,
            'customer_organization' => $this->faker->randomElement(['Travel', 'Finance', 'Insurance', 'Autocare']),
            'customer_mobile_number' => $this->faker->phoneNumber,
            'customer_birthdate' => $birthdate,
            'customer_status' => "1"
        ];
    }
}
