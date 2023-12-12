<?php

namespace Database\Factories;

use App\Models\Semester;
use Illuminate\Database\Eloquent\Factories\Factory;

class SemesterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'management' => $this->faker->word,
            'startDate' => $this->faker->date,
            'endDate' => $this->faker->date,
            'status' => $this->faker->randomElement(['A', 'I']),
        ];
    }
}
