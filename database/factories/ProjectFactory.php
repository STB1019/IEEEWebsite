<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $paragraphs = $this->faker->paragraphs(4);
        $description = implode(" ", $paragraphs);

        $paragraphs2 = $this->faker->paragraphs(20);
        $description2 = implode(" ", $paragraphs2);

        $description = $description."\n".$description2;

        $names="";
        
        for ($i=0; $i < rand(1, 5); $i++) { 
            $names.=" ".$this->faker->name;
        }


        return [
            'title' => $this->faker->sentence,
            'description' => $description,
            'date' => null,
            'active' => $this->faker->boolean,
            'layout' => $this->faker->numberBetween(0, 1),
            'team_members' => $names,
            ];
    }
}
