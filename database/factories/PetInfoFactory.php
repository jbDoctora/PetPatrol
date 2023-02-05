<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PetInfo>
 */
class PetInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => fake()->word(),
            'name' => fake()->word(),
            'years' => fake()->number_format(),
            'months' => fake()->number_format(),
            'breed' => fake()->word(),
            'weight' => fake()->number_format()
        ];
    }
}
