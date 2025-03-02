<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agent>
 */
class AgentFactory extends Factory
{

    private int $index = -1;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->index++;
        return [
            'name'=> fake()->name(),
            'image'=>["img/team-1.jpg", "img/team-2.jpg", "img/team-3.jpg", "img/team-4.jpg"][$this->index%4],
            'designation'=>fake()->word(),
            'description'=>fake()->paragraph(3),
        ];
    }
}
