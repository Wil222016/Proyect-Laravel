<?php

namespace Database\Factories;

use App\Models\TypeMenu;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeMenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'status' => $this->faker->randomElement(['A', 'I']),
        ];
    }
}
