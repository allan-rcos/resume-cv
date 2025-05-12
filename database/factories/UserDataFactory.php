<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserData>
 */
class UserDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'  => User::all()->random()->id,
            'filename' => null,
            'cover'    => null,
            'career'   => fake()->jobTitle,
            'phone'    => fake()->phoneNumber,
            'address'  => fake()->address,
            'summary'  => fake()->paragraph
        ];
    }
}
