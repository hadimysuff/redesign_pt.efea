<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feature>
 */
class FeatureFactory extends Factory
{
    public function definition(): array
    {
        return [
            'icon' => 'shield-check',
            'title' => $this->faker->words(2, true),
            'description' => $this->faker->sentence(12),
            'sort_order' => $this->faker->numberBetween(0, 10),
        ];
    }
}
