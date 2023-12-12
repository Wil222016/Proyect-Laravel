<?php

namespace Database\Factories;

use App\Models\Dish;
use Illuminate\Database\Eloquent\Factories\Factory;

class DishFactory extends Factory
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
            'status' => $this->faker->randomElement(['A', 'I']),
            'type_dish_id' => $this->faker->numberBetween(1, 50), // Cambia según tus necesidades y la cantidad de type_dishes
            'menu_offered_id' => $this->faker->numberBetween(1, 50), // Cambia según tus necesidades y la cantidad de offered_menus
        ];
    }
}
