<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HeroSlide>
 */
class HeroSlideFactory extends Factory
{
    public function definition(): array
    {
        return [
            'eyebrow' => $this->faker->words(2, true),
            'title' => $this->faker->sentence(4),
            'subtitle' => $this->faker->sentence(6),
            'description' => $this->faker->paragraph(),
            'image' => null,
            'primary_label' => 'Get Started',
            'primary_url' => '#contact',
            'secondary_label' => 'Our Services',
            'secondary_url' => '#services',
            'sort_order' => $this->faker->numberBetween(0, 10),
            'is_active' => true,
        ];
    }
}
