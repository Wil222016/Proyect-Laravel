<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
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
            'num_people' => $this->faker->numberBetween(1, 10),
            'total_amount' => $this->faker->randomFloat(2, 50, 200),
            'receipt' => $this->faker->text(250),
            'status' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'client_id' => $this->faker->numberBetween(1, 50), 
            'person_id' => $this->faker->numberBetween(1, 50), 
            'menu_offered_id' => $this->faker->numberBetween(1, 50),
        ];
    }
}
