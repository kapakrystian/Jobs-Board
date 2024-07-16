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
            'title' => fake()->boolean(70) ? fake()->jobTitle() : Job::all()->random()->title,
            'employer_id' => fake()->boolean(70) ? Employer::all()->random()->id : Employer::factory(),
            'salary' => (string) round(fake()->numberBetween(1000, 15000), -3) . '$'
        ];
    }
}
