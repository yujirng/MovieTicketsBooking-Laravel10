<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title' => $this->faker->sentence,
            'director' => $this->faker->name,
            'release_date' => $this->faker->date,
            'genre_id' => rand(1, 10),
            'language' => $this->faker->languageCode,
            'trailer_link' => $this->faker->url,
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl,
            'status' => rand(0, 1),
            'running' => rand(0, 1),
        ];
    }
}
