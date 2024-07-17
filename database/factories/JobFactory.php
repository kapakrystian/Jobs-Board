<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Job;
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
            'employer_id' => fake()->boolean(70) ? Employer::all()->random()->id : Employer::factory(),
            'title' => fake()->jobTitle(),
            'salary' => (string) round(fake()->numberBetween(1000, 15000), -3) . '$',
        ];
    }
}
