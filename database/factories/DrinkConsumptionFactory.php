<?php

namespace Database\Factories;

use App\Models\DrinkConsumption;
use Illuminate\Database\Eloquent\Factories\Factory;

class DrinkConsumptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            /* 'quantity' => $this->faker->numberBetween(1, 5),
            'unit_price' => $this->faker->randomFloat(2, 2, 10),
            'entry_register_id' => $this->faker->numberBetween(1, 50), 
            'drink_id' => $this->faker->numberBetween(1, 50), */
        ];
    }
}
