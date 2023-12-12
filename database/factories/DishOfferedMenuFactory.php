<?php

namespace Database\Factories;

use App\Models\Dish;
use App\Models\OfferedMenu;
use App\Models\DishOfferedMenu;
use Illuminate\Database\Eloquent\Factories\Factory;

class DishOfferedMenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dish_id' => Dish::factory(),
            'menu_offered_id' => OfferedMenu::factory(),
        ];
    }
}
