<?php

namespace Database\Factories;

use App\Enums\SocialIconsEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Link>
 */
class LinkFactory extends Factory
{
    private ?array $icons = null;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        if(!isset($this->icons))
            $this->icons = SocialIconsEnum::cases();
        return [
            'user_id'  => User::all()->random()->id,
            'icon' => fake()->optional(.9)->randomElement($this->icons)?->value,
            'url'  => fake()->url
        ];
    }
}
