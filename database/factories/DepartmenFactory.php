<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DepartmenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'department_name' => $this->faker->randomElement([
                'Administrative and Tower',
                'Autocare',
                'Office of the CEO',
                'MarComm',
                'Department of Corporate Affair and Governance',
                'ERS Central',
                'Accounting',
                'Human Resources and Development',
                'Insurance',
                'Information Systems Technology',
                'Legal',
                'Membership - Main',
                'Membership - Alabang',
                'Membership - Baliwag',
                'Membership - Dasmariñas',
                'Membership - Cebu',
                'Membership - Davao (Abreeza)',
                'Membership - Davao (SM Ecoland)',
                'Membership - Fairview',
                'Membership - Feliz',
                'Membership - La Union',
                'Membership - Southwoods',
                'Membership - Calamba',
                'Membership - Sta. Rosa',
                'Membership - Lipa',
                'Membership - Makati',
                'Membership - Ermita',
                'Membership - Market - Market',
                'Membership - Marquee',
                'Membership - San Fernando Pampanga',
                'Motorsports',
                'Motorpool',
                'Purchasing Road Safety',
                'Travel/Lakbay',
                'SOMCO'
            ])
        ];
    }
}
