<?php

namespace Database\Factories;

use App\Enums\LanguageEnum;
use App\Enums\LanguageProficiencyEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Language>
 */
class LanguageFactory extends Factory
{
    private ?array $languages = null;
    private ?array $proficiencies = null;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if(!isset($this->languages))
            $this->languages = LanguageEnum::cases();
        if(!isset($this->proficiencies))
            $this->proficiencies = LanguageProficiencyEnum::cases();
        return [
            'user_id'     => User::all()->random()->id,
            'language'    => $this->faker->randomElement($this->languages)?->value,
            'proficiency' => $this->faker->randomElement($this->proficiencies)?->value
        ];
    }
}
