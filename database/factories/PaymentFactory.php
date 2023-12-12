<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => $this->faker->randomFloat(2, 10, 200),
            'payment_method' => $this->faker->randomElement(['A', 'B', 'C', 'E']),
            'receipt' => $this->faker->text(250),
            'status' => $this->faker->randomElement(['A', 'B', 'C']),
            'reservation_id' => $this->faker->numberBetween(1, 50), 
            'entry_register_id' => $this->faker->numberBetween(1, 50), 
        ];
    }
}
