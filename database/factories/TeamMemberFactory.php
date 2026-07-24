<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeamMember>
 */
class TeamMemberFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'position' => $this->faker->jobTitle(),
            'photo' => null,
            'bio' => $this->faker->sentence(14),
            'linkedin_url' => null,
            'email' => $this->faker->safeEmail(),
            'sort_order' => $this->faker->numberBetween(0, 10),
        ];
    }
}
