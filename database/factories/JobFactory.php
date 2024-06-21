<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => \App\Models\Employer::factory(),
            'title' => fake()->jobTitle(),
            'salary' => '$' . fake()->numberBetween(50, 180) . ',000 USD',
            'employment_type' => fake()->randomElement(\App\Enums\EmploymentType::class),
            'location' => rand(0, 1) ? fake()->country() : 'Remote',
            'url' => fake()->url(),
            'is_featured' => fake()->boolean(10),
        ];
    }
}