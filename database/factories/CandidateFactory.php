<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'candidate_firstname' => $this->faker->firstName,
            'candidate_middlename' => $this->faker->optional()->firstName,
            'candidate_lastname' => $this->faker->lastName, 
        ];
    }
}
