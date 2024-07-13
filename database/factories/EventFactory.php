<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
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

        $date1 = $this->faker->date;
        $date2 = $this->faker->date;

        if($date1 > $date2){
            $date1 = $date2;
        }

        return [
            'title' => $this->faker->sentence,
            'description' => $description,
            'date_start' => $date1,
            'date_end' => $date2,
            'layout' => $this->faker->numberBetween(0, 1)
        ];
        
    }
}
