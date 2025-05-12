<?php

namespace Database\Factories;

use App\Enums\SkillTypeEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skill>
 */
class SkillFactory extends Factory
{
    private ?array $skillType = null;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if($this->skillType === null)
            $this->skillType = SkillTypeEnum::cases();
        return [
            'user_id'  => User::all()->random()->id,
            'name'     => fake()->domainWord,
            'type'     => fake()->randomElement($this->skillType)?->value,
            'level'    => rand(0, 100)
        ];
    }

    public function softType(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 0,
        ]);
    }

    public function hardType(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 1,
        ]);
    }
}
