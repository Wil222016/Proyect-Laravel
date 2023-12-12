<?php

namespace Database\Factories;

use App\Models\OfferedMenu;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfferedMenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'price' => $this->faker->randomFloat(2, 1, 100),
            'date' => $this->faker->date,
            'photo' => $this->faker->imageUrl,
            'status' => $this->faker->randomElement(['A', 'I']),
            'semester_id' => $this->faker->numberBetween(1, 50), 
            'type_menu_id' => $this->faker->numberBetween(1, 50), 
            'schedule_id' => $this->faker->numberBetween(1, 50), 
            'category_id' => $this->faker->numberBetween(1, 50), 
        ];
    }
}
