<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'     => User::all()->random()->id,
            'name'        => fake()->jobTitle,
            'photo'       => null,
            'school'      => fake()->company,
            'address'     => fake()->address,
            'start'       => fake()->dateTime,
            'end'         => fake()->optional(.9)->dateTime
        ];
    }
}
