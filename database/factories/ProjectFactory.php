<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->unique()->company();

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'category' => $this->faker->randomElement(Project::CATEGORIES),
            'client' => $this->faker->company(),
            'description' => $this->faker->paragraph(),
            'image' => null,
            'url' => null,
            'year' => $this->faker->numberBetween(2020, 2026),
            'is_featured' => $this->faker->boolean(30),
            'sort_order' => $this->faker->numberBetween(0, 10),
        ];
    }
}
