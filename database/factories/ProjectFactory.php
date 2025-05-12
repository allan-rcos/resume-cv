<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
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
            'url'         => fake()->optional(.9)->url,
            'start'       => fake()->dateTime,
            'end'         => fake()->optional(.1)->dateTime
        ];
    }
}
