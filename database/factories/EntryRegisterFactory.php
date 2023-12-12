<?php

namespace Database\Factories;

use App\Models\EntryRegister;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntryRegisterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->dateTime,
            'quantity' => $this->faker->numberBetween(1, 10),
            'total' => $this->faker->randomFloat(2, 10, 100),
            'status' => $this->faker->randomElement(['A', 'B', 'C']),
            'employee_id' => $this->faker->numberBetween(1, 50), 
            'menu_offered_id' => $this->faker->numberBetween(1, 50),
            'reservation_id' => null,
        ];
    }
}
