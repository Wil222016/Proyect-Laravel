<?php

namespace Database\Factories;

use App\Models\DishType;
use Illuminate\Database\Eloquent\Factories\Factory;

class DishTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word, // Ajusta según tus necesidades
            'description' => $this->faker->sentence, // Ajusta según tus necesidades
            'dish_count' => $this->faker->randomNumber(),
            'status' => $this->faker->randomElement(['A', 'I']),
        ];
    }
}
