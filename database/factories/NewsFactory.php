<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $paragraphs = $this->faker->paragraphs(4);
        $description = implode(" ", $paragraphs);

        $paragraphs2 = $this->faker->paragraphs(20);
        $description2 = implode(" ", $paragraphs2);

        $description = $description."\n".$description2;

        return [
            'title' => $this->faker->sentence,
            'description' => $description,
            'date' => $this->faker->date,
            'author' => $this->faker->name,
            'layout' => $this->faker->numberBetween(0, 1),
        ];
    }
}
